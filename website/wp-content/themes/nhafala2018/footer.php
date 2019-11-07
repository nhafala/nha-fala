
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
<script>
    setInterval(function() {
        setTimeout(function () {
            var count = document.getElementsByClassName('fc-event-container').length;
            var event = document.getElementsByClassName('fc-event-container');
            var i;
            for (i = 0; i < count; i++) {
                var a = event[i].children;
                var splitniz = a[0].getAttribute("class").split(" ");
                var counta = splitniz.length;
                var niz = [];
                for (k = 0; k < counta; k++) {
                    if (splitniz[k] === 'eo-event-cat-hurrlibus') {
                        niz[niz.length] = '#F73636';
                    }
                    if (splitniz[k] === 'eo-event-cat-trottinett') {
                        niz[niz.length] = '#5FD11F';
                    }
                    if (splitniz[k] === 'eo-event-cat-geradewaegs') {
                        niz[niz.length] = '#44FDED';
                    }
                    if (splitniz[k] === 'eo-event-cat-rockets') {
                        niz[niz.length] = '#FDF144';
                    }
                    if (splitniz[k] === 'eo-event-cat-auftritt') {
                        niz[niz.length] = '#FDC108';
                    }
                }
                if (niz.length == 2) {
                    var prvaboja = niz[0];
                    var drugaboja = niz[1];
                    document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 50%, '+drugaboja+' 50%, '+drugaboja+' 100%);');
                }
                if (niz.length == 3) {
                    var prvaboja = niz[0];
                    var drugaboja = niz[1];
                    var trecaboja = niz[2];
                    document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 33%, '+drugaboja+' 33%, '+drugaboja+' 66%, '+trecaboja+' 66%, '+trecaboja+' 100%);');
                }
                if (niz.length == 4) {
                    var prvaboja = niz[0];
                    var drugaboja = niz[1];
                    var trecaboja = niz[2];
                    var cetvrtaboja = niz[3];
                    document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 25%, '+drugaboja+' 25%, '+drugaboja+' 50%, '+trecaboja+' 50%, '+trecaboja+' 75%, '+cetvrtaboja+' 75%, '+cetvrtaboja+' 100%);');
                }
                if (niz.length == 5) {
                    var prvaboja = niz[0];
                    var drugaboja = niz[1];
                    var trecaboja = niz[2];
                    var cetvrtaboja = niz[3];
                    var petaboja = niz[4];
                    document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 20%, '+drugaboja+' 20%, '+drugaboja+' 40%, '+trecaboja+' 40%, '+trecaboja+' 60%, '+cetvrtaboja+' 60%, '+cetvrtaboja+' 80%, '+petaboja+' 80%, '+petaboja+' 100%);');
                }
                // if (niz.length == 6) {
                //     var prvaboja = niz[0];
                //     var drugaboja = niz[1];
                //     var trecaboja = niz[2];
                //     var cetvrtaboja = niz[3];
                //     var petaboja = niz[4];
                //     var sestaboja = niz[5];
                //     document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 16%, '+drugaboja+' 16%, '+drugaboja+' 33%, '+trecaboja+' 33%, '+trecaboja+' 49%, '+cetvrtaboja+' 49%, '+cetvrtaboja+' 67%, '+petaboja+' 67%, '+petaboja+' 84%, '+sestaboja+' 84%, '+sestaboja+' 100%);');
                // }
                // if (niz.length == 7) {
                //     var prvaboja = niz[0];
                //     var drugaboja = niz[1];
                //     var trecaboja = niz[2];
                //     var cetvrtaboja = niz[3];
                //     var petaboja = niz[4];
                //     var sestaboja = niz[5];
                //     var sedmaboja = niz[6];
                //     document.getElementsByClassName("fc-content")[i].setAttribute('style', 'background: linear-gradient(to right, '+prvaboja+' 14%, '+drugaboja+' 14%, '+drugaboja+' 29%, '+trecaboja+' 29%, '+trecaboja+' 43%, '+cetvrtaboja+' 43%, '+cetvrtaboja+' 57%, '+petaboja+' 57%, '+petaboja+' 72%, '+sestaboja+' 72%, '+sestaboja+' 86%, '+sedmaboja+' 86%, '+sedmaboja+' 100%);');
                // }
            }
            ;
        }, 500);
    }, 500);
</script>
</body>
</html>
