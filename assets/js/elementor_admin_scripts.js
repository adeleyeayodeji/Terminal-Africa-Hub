/**
 * restoreDefaultColor elementor button
 *
 */
let restoreTerminalDefaultColor = () => {
  //silence is golden
};

/**
 * Elementor script
 *
 */
elementor.channels.editor.on(
  "terminal:editor:innerpage:restoreDefaultColor",
  restoreTerminalDefaultColor
);
