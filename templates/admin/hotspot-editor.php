<?php
/**
 * Hotspot editor meta box. The featured image is the canvas: clicking it adds
 * a hotspot and the dots on it can be dragged. Each row keeps an x%, a y% and
 * a product, so the number inputs stay the keyboard and screen reader path.
 *
 * @package Lookbook
 *
 * @var array<int, array{x: float, y: float, product_id: int}> $hotspots Stored hotspots.
 * @var string                                                 $imageHtml Featured image markup, empty when none is set.
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Variables are local to the template include scope, not true globals.
?>
<div class="lookbook-editor" data-lookbook-editor>
    <p class="lookbook-editor__intro">
        <?php esc_html_e('Set the lookbook image using the Featured image box, then click the image where a product appears to add a hotspot there. Drag a dot to move it, or type X and Y as a percentage from the top-left of the image (0-100), and search for the product to link.', 'lookwick'); ?>
    </p>

    <div class="lookbook-editor__canvas" data-lookbook-canvas<?php echo $imageHtml === '' ? ' hidden' : ''; ?>>
        <?php echo wp_kses_post($imageHtml); ?>
    </div>
    <p class="lookbook-editor__no-image" data-lookbook-no-image<?php echo $imageHtml === '' ? '' : ' hidden'; ?>>
        <?php esc_html_e('Set a lookbook image in the Featured image box to place hotspots by clicking on it.', 'lookwick'); ?>
    </p>

    <div class="lookbook-editor__rows-wrap">
        <table class="widefat lookbook-editor__table" data-lookbook-rows>
                <thead>
                    <tr>
                        <th scope="col" class="lookbook-editor__col-num"><?php esc_html_e('#', 'lookwick'); ?></th>
                        <th scope="col"><?php esc_html_e('X %', 'lookwick'); ?></th>
                        <th scope="col"><?php esc_html_e('Y %', 'lookwick'); ?></th>
                        <th scope="col"><?php esc_html_e('Product', 'lookwick'); ?></th>
                        <?php do_action('lookbook/admin_hotspot_row_header'); ?>
                        <th scope="col" class="lookbook-editor__col-actions"><span class="screen-reader-text"><?php esc_html_e('Actions', 'lookwick'); ?></span></th>
                    </tr>
                </thead>
                <tbody data-lookbook-rows-body>
                    <?php
                    $rows = $hotspots === [] ? [['x' => 50.0, 'y' => 50.0, 'product_id' => 0]] : $hotspots;
                    foreach ($rows as $i => $row) :
                        ?>
                        <tr class="lookbook-editor__row" data-lookbook-row>
                            <td class="lookbook-editor__col-num"><span data-lookbook-row-number><?php echo esc_html((string) ($i + 1)); ?></span></td>
                            <td>
                                <label class="screen-reader-text" for="lookbook_x_<?php echo esc_attr((string) $i); ?>"><?php esc_html_e('X percentage', 'lookwick'); ?></label>
                                <input
                                    type="number"
                                    id="lookbook_x_<?php echo esc_attr((string) $i); ?>"
                                    name="lookbook_hotspots[<?php echo esc_attr((string) $i); ?>][x]"
                                    value="<?php echo esc_attr((string) $row['x']); ?>"
                                    min="0"
                                    max="100"
                                    step="0.1"
                                    class="small-text"
                                    data-lookbook-x
                                />
                            </td>
                            <td>
                                <label class="screen-reader-text" for="lookbook_y_<?php echo esc_attr((string) $i); ?>"><?php esc_html_e('Y percentage', 'lookwick'); ?></label>
                                <input
                                    type="number"
                                    id="lookbook_y_<?php echo esc_attr((string) $i); ?>"
                                    name="lookbook_hotspots[<?php echo esc_attr((string) $i); ?>][y]"
                                    value="<?php echo esc_attr((string) $row['y']); ?>"
                                    min="0"
                                    max="100"
                                    step="0.1"
                                    class="small-text"
                                    data-lookbook-y
                                />
                            </td>
                            <td>
                                <?php
                                $productId    = (int) $row['product_id'];
                                $productLabel = '';
                                if ($productId > 0) {
                                    $product      = wc_get_product($productId);
                                    $productLabel = $product instanceof \WC_Product
                                        ? wp_strip_all_tags($product->get_formatted_name())
                                        : '#' . $productId;
                                }
                                ?>
                                <label class="screen-reader-text" for="lookbook_pid_<?php echo esc_attr((string) $i); ?>"><?php esc_html_e('Product', 'lookwick'); ?></label>
                                <select
                                    id="lookbook_pid_<?php echo esc_attr((string) $i); ?>"
                                    name="lookbook_hotspots[<?php echo esc_attr((string) $i); ?>][product_id]"
                                    class="wc-product-search lookbook-editor__product"
                                    data-placeholder="<?php esc_attr_e('Search for a product', 'lookwick'); ?>"
                                    data-allow_clear="true"
                                    data-lookbook-pid
                                >
                                    <?php if ($productId > 0) : ?>
                                        <option value="<?php echo esc_attr((string) $productId); ?>" selected><?php echo esc_html($productLabel); ?></option>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <?php do_action('lookbook/admin_hotspot_row_cells', $i, $row); ?>
                            <td class="lookbook-editor__col-actions">
                                <button type="button" class="button-link lookbook-editor__remove" data-lookbook-remove>
                                    <?php esc_html_e('Remove', 'lookwick'); ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <button type="button" class="button lookbook-editor__add" data-lookbook-add>
                    <?php esc_html_e('+ Add hotspot', 'lookwick'); ?>
                </button>
        </p>
    </div>
</div>
