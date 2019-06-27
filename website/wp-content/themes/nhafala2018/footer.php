
</div> <!-- /#content -->

</div> <!-- /#wrap -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container-fluid">
    <div class="rw">
      <div class="c-x-12 c-m-3 footer-logo-container">
        <?php if ($logo_image_id = get_theme_option('custom_logo')) : ?>
          <?php $image = wp_get_attachment_image_src($logo_image_id, 'large'); ?>
          <a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
            <?php print get_nhafala_logo(); ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="c-x-12 c-m-6 footer-menu-container">
        <?php if ( has_nav_menu( 'footer' ) ) : ?>
          <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'nhafala' ); ?>">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'footer',
                  'menu_class'     => 'footer-menu',
                  'depth'          => 1,
                )
              );
            ?>
          </nav><!-- .social-navigation -->
        <?php endif; ?>                
      </div>
      <div class="c-x-12 c-m-3 footer-social-menu-container">
        <?php if ( has_nav_menu( 'social' ) ) : ?>
          <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'nhafala' ); ?>">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'social',
                  'menu_class'     => 'social-links-menu',
                  'depth'          => 1,
                  'link_before'    => '<span class="screen-reader-text">',
                  'link_after'     => '</span>' . nhafala_get_svg( array( 'icon' => 'chain' ) ),
                )
              );
            ?>
          </nav><!-- .social-navigation -->
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->

<a id="to-top" href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a>

<?php wp_footer(); ?>
</body>
</html>
