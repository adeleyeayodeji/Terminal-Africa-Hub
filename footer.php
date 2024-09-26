  <div class="terminal-footer">
    <?php
    /**
     * Select footer type
     * @hooked footer 1 - 2
     */
    //get footer type
    $footer_type = get_theme_mod('footer_type', '1');
    //display footer
    get_template_part('templates/parts/footer', $footer_type);
    ?>
  </div>
  <!-- /container-fluid -->
  </div>
  <!-- /terminal-africa-theme-bs -->
  </div>

  <?php wp_footer(); ?>
  </body>

  </html>