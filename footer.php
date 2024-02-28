  <div class="terminal-footer">
      <div class="row m-0">
          <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
              <div class="terminal-footer-1">
                  <img src="http://localhost:8888/wordpress/wp-content/plugins/terminal-africa/assets/img/logo-full.png" alt="">
                  <nav>
                      <a href="mailto:info@company.com">info@company.com</a>
                      <a href="tel:+234012345678">+234012345678</a>
                  </nav>
              </div>
              <div class="terminal-footer-1-social">
                  <nav>
                      <a href="#">
                          <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/facebook.svg') ?>" alt="">
                      </a>
                      <a href="#">
                          <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/x.svg') ?>" alt="">
                      </a>
                      <a href="#">
                          <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/instagram.svg') ?>" alt="">
                      </a>
                  </nav>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
              <h4>Product</h4>
              <?php
                //get wp menu 'product'
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'menu_class' => 't-hub-menu-ul',
                        'menu' => 'product'
                    )
                );
                ?>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
              <h4>Company</h4>
              <?php
                //get wp menu 'product'
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'menu_class' => 't-hub-menu-ul',
                        'menu' => 'company'
                    )
                );
                ?>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
              <h4>Legal</h4>
              <?php
                //get wp menu 'product'
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'container' => '',
                        'menu_class' => 't-hub-menu-ul',
                        'menu' => 'legal'
                    )
                );
                ?>
          </div>
      </div>
  </div>
  <!-- /container-fluid -->
  </div>
  <!-- /terminal-africa-theme-bs -->
  </div>

  <?php wp_footer(); ?>
  </body>

  </html>