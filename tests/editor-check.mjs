// Run: node tests/editor-check.mjs
// Loads assets/js/editor.js without a DOM and checks the click-to-percent math.
import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import vm from 'node:vm';

const src = readFileSync(new URL('../assets/js/editor.js', import.meta.url), 'utf8');
const window = { lookbookEditor: {} };
vm.runInNewContext(src, { window, document: { querySelector: () => null } });

const pct = window.lookbookEditor.percentFromPoint;
const rect = { left: 100, top: 50, width: 400, height: 300 };

assert.deepEqual({ ...pct(300, 200, rect) }, { x: 50, y: 50 });
assert.deepEqual({ ...pct(100, 50, rect) }, { x: 0, y: 0 });
assert.deepEqual({ ...pct(133.3, 77.77, rect) }, { x: 8.3, y: 9.3 }, 'one decimal');
assert.deepEqual({ ...pct(-20, 9999, rect) }, { x: 0, y: 100 }, 'clamped to 0-100');
assert.deepEqual({ ...pct(10, 10, { left: 0, top: 0, width: 0, height: 0 }) }, { x: 0, y: 0 }, 'zero-size image');

console.log('editor-check: OK');
