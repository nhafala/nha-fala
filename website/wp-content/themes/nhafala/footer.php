<body>
<div id="menuwrapper" class="menu_text" >
    <?php
if( is_user_logged_in() ) {
    $menu = 'logged-in-menu';
} else {
    $menu = 'logged-out-menu';
}
 
wp_nav_menu( array( 'menu' => $menu, 'theme_location' => 'main-nav-menu' ) );
?>
    <div class="footer" id="menu_footer">Nha Fala - Jugendchor der Pfarrei Horw - Neumattstrasse 3 - 6048 Horw - <a href="mailto:gabi.koller@bluewin.ch">info@nha-fala.ch</a></div>
</div>
<?php wp_footer(); ?>
</body>