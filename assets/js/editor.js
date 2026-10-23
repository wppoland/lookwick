/**
 * Lookbook, hotspot editor (meta box) enhancements.
 *
 * Progressive and dependency-free (the WooCommerce product search brings its
 * own jQuery; this file only fires its documented init event). Clicking the
 * image adds a row at that point, the dots on the image can be dragged, and
 * every change is written to the X/Y number inputs, which stay the keyboard
 * and screen reader path. With JS disabled the rows printed by PHP still save.
 */
( function () {
	'use strict';

	var config = ( window.lookbookEditor = window.lookbookEditor || {} );

	/**
	 * Position of a point inside a rectangle as percentages from its top-left,
	 * clamped to 0-100 and rounded to one decimal (the precision the
	 * repository stores).
	 *
	 * @param {number} clientX
	 * @param {number} clientY
	 * @param {{left: number, top: number, width: number, height: number}} rect
	 * @return {{x: number, y: number}} Percentages.
	 */
	function percentFromPoint( clientX, clientY, rect ) {
		function axis( offset, size ) {
			if ( ! size ) {
				return 0;
			}
			var value = ( offset / size ) * 100;
			return Math.round( Math.max( 0, Math.min( 100, value ) ) * 10 ) / 10;
		}

		return {
			x: axis( clientX - rect.left, rect.width ),
			y: axis( clientY - rect.top, rect.height ),
		};
	}

	config.percentFromPoint = percentFromPoint;

	var editor = document.querySelector( '[data-lookbook-editor]' );

	if ( ! editor ) {
		return;
	}

	var i18n = config.i18n || {};
	var body = editor.querySelector( '[data-lookbook-rows-body]' );
	var canvas = editor.querySelector( '[data-lookbook-canvas]' );
	var noImage = editor.querySelector( '[data-lookbook-no-image]' );

	function rows() {
		return body.querySelectorAll( '[data-lookbook-row]' );
	}

	// The product search is the WooCommerce selectWoo widget; it listens for
	// this jQuery event to enhance any select it has not seen yet.
	function initProductSearch() {
		if ( window.jQuery ) {
			window.jQuery( document.body ).trigger( 'wc-enhanced-select-init' );
		}
	}

	function image() {
		return canvas ? canvas.querySelector( 'img' ) : null;
	}

	function rowValue( row, attr ) {
		var input = row.querySelector( '[' + attr + ']' );
		var value = input ? parseFloat( input.value ) : NaN;
		return isNaN( value ) ? 50 : Math.max( 0, Math.min( 100, value ) );
	}

	function setRowPosition( row, point ) {
		var xInput = row.querySelector( '[data-lookbook-x]' );
		var yInput = row.querySelector( '[data-lookbook-y]' );
		if ( xInput ) {
			xInput.value = String( point.x );
		}
		if ( yInput ) {
			yInput.value = String( point.y );
		}
	}

	function renderDots() {
		if ( ! canvas ) {
			return;
		}

		canvas
			.querySelectorAll( '[data-lookbook-dot]' )
			.forEach( function ( dot ) {
				dot.remove();
			} );

		rows().forEach( function ( row, index ) {
			var dot = document.createElement( 'span' );
			dot.className = 'lookbook-editor__dot';
			dot.setAttribute( 'data-lookbook-dot', String( index ) );
			// The X/Y inputs are the accessible control; the dot is a visual
			// shortcut for pointer users.
			dot.setAttribute( 'aria-hidden', 'true' );
			dot.textContent = String( index + 1 );
			dot.style.left = rowValue( row, 'data-lookbook-x' ) + '%';
			dot.style.top = rowValue( row, 'data-lookbook-y' ) + '%';
			canvas.appendChild( dot );
		} );
	}

	function reindex() {
		rows().forEach( function ( row, index ) {
			var num = row.querySelector( '[data-lookbook-row-number]' );
			if ( num ) {
				num.textContent = String( index + 1 );
			}
			row.querySelectorAll( 'input, select' ).forEach( function ( field ) {
				var name = field.getAttribute( 'name' );
				if ( name ) {
					field.setAttribute(
						'name',
						name.replace(
							/lookbook_hotspots\[\d+\]/,
							'lookbook_hotspots[' + index + ']'
						)
					);
				}

				// Keep the per-row id and its matching <label for> unique so
				// each field has its own accessible name. Ids are minted by PHP
				// as lookbook_<field>_<rowIndex> (e.g. lookbook_x_0).
				var id = field.getAttribute( 'id' );
				if ( ! id ) {
					return;
				}
				var newId = id.replace( /_\d+$/, '_' + index );
				if ( newId === id ) {
					return;
				}
				var label = row.querySelector( 'label[for="' + id + '"]' );
				field.setAttribute( 'id', newId );
				if ( label ) {
					label.setAttribute( 'for', newId );
				}
			} );
		} );
		renderDots();
	}

	function clearProduct( select ) {
		select.innerHTML = '';
		if ( window.jQuery ) {
			window.jQuery( select ).trigger( 'change' );
		}
	}

	function addRow( x, y ) {
		var all = rows();
		var template = all[ all.length - 1 ];

		if ( ! template ) {
			return;
		}

		var clone = template.cloneNode( true );

		// A clone of an enhanced select carries the widget's markup but none of
		// its state, so strip it back to a plain select and let WooCommerce
		// enhance it again.
		clone
			.querySelectorAll( '.select2-container' )
			.forEach( function ( node ) {
				node.remove();
			} );
		clone.querySelectorAll( 'select' ).forEach( function ( select ) {
			select.classList.remove( 'enhanced', 'select2-hidden-accessible' );
			select.removeAttribute( 'data-select2-id' );
			select.removeAttribute( 'aria-hidden' );
			select.removeAttribute( 'tabindex' );
			select.innerHTML = '';
		} );
		clone.querySelectorAll( 'input' ).forEach( function ( input ) {
			if ( input.hasAttribute( 'data-lookbook-x' ) ) {
				input.value = String( x );
			} else if ( input.hasAttribute( 'data-lookbook-y' ) ) {
				input.value = String( y );
			} else if ( input.type === 'checkbox' || input.type === 'radio' ) {
				input.checked = false;
			} else {
				input.value = '';
			}
		} );

		body.appendChild( clone );
		reindex();
		initProductSearch();
	}

	function removeRow( row ) {
		if ( rows().length <= 1 ) {
			// Keep at least one (blank) row rather than leaving an empty table.
			row.querySelectorAll( 'input' ).forEach( function ( input ) {
				input.value =
					input.hasAttribute( 'data-lookbook-x' ) ||
					input.hasAttribute( 'data-lookbook-y' )
						? '50'
						: '';
			} );
			row.querySelectorAll( 'select' ).forEach( clearProduct );
		} else {
			row.remove();
		}
		reindex();
	}

	editor.addEventListener( 'click', function ( event ) {
		if ( event.target.closest( '[data-lookbook-add]' ) ) {
			event.preventDefault();
			addRow( 50, 50 );
			return;
		}

		var removeBtn = event.target.closest( '[data-lookbook-remove]' );
		if ( removeBtn ) {
			event.preventDefault();
			var confirmMsg = i18n.confirmRemove;
			if ( confirmMsg && ! window.confirm( confirmMsg ) ) {
				return;
			}
			removeRow( removeBtn.closest( '[data-lookbook-row]' ) );
			return;
		}

		var img = image();
		if ( ! img || event.target !== img ) {
			return;
		}

		var point = percentFromPoint(
			event.clientX,
			event.clientY,
			img.getBoundingClientRect()
		);
		var all = rows();
		var only = all.length === 1 ? all[ 0 ] : null;
		var onlySelect = only && only.querySelector( 'select' );

		// The first click fills the blank starter row instead of adding a
		// second row next to it.
		if ( onlySelect && ! onlySelect.value ) {
			setRowPosition( only, point );
			renderDots();
			return;
		}
		addRow( point.x, point.y );
	} );

	editor.addEventListener( 'input', function ( event ) {
		if ( event.target.matches( '[data-lookbook-x], [data-lookbook-y]' ) ) {
			renderDots();
		}
	} );

	if ( canvas ) {
		canvas.addEventListener( 'dragstart', function ( event ) {
			event.preventDefault();
		} );

		canvas.addEventListener( 'pointerdown', function ( event ) {
			var dot = event.target.closest( '[data-lookbook-dot]' );
			var img = image();
			if ( ! dot || ! img ) {
				return;
			}

			var row =
				rows()[ parseInt( dot.getAttribute( 'data-lookbook-dot' ), 10 ) ];
			if ( ! row ) {
				return;
			}

			event.preventDefault();
			dot.setPointerCapture( event.pointerId );
			dot.classList.add( 'is-dragging' );

			function move( moveEvent ) {
				var point = percentFromPoint(
					moveEvent.clientX,
					moveEvent.clientY,
					img.getBoundingClientRect()
				);
				setRowPosition( row, point );
				dot.style.left = point.x + '%';
				dot.style.top = point.y + '%';
			}

			function end() {
				dot.classList.remove( 'is-dragging' );
				dot.removeEventListener( 'pointermove', move );
				dot.removeEventListener( 'pointerup', end );
				dot.removeEventListener( 'pointercancel', end );
			}

			dot.addEventListener( 'pointermove', move );
			dot.addEventListener( 'pointerup', end );
			dot.addEventListener( 'pointercancel', end );
		} );

		// The Featured image box swaps its markup over AJAX, so follow it and
		// show the new image without a reload.
		var thumbBox = document.getElementById( 'postimagediv' );
		if ( thumbBox && window.MutationObserver ) {
			new window.MutationObserver( function () {
				var source = thumbBox.querySelector( '.inside img' );
				var img = image();

				canvas.hidden = ! source;
				if ( noImage ) {
					noImage.hidden = !! source;
				}
				if ( ! source ) {
					return;
				}

				if ( ! img ) {
					img = document.createElement( 'img' );
					img.className = 'lookbook-editor__image';
					img.alt = '';
					canvas.insertBefore( img, canvas.firstChild );
				}
				if ( img.getAttribute( 'src' ) !== source.getAttribute( 'src' ) ) {
					[ 'srcset', 'sizes', 'width', 'height' ].forEach(
						function ( attr ) {
							img.removeAttribute( attr );
						}
					);
					img.src = source.getAttribute( 'src' );
				}
				renderDots();
			} ).observe( thumbBox, { childList: true, subtree: true } );
		}
	}

	renderDots();
} )();
