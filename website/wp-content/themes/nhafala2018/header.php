<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<div id="wrap">
<div id="header">
  <div class="container">
    <?php
    // Show login message if user just logged in
    $id = get_current_user_id();
    if (is_user_logged_in() && get_transient("_nhafala_login_{$id}")) {
      // Login Message!
      ?>
      <span class="nhafala-login-message" data-delay="3000" data-message="Login erfolgreich"></span>
      <?php
      delete_transient("_nhafala_login_{$id}");
    }
    ?>
    <div class="rw">

      <?php path_from_url('http://sgakiushgdlakj/wp-content/uploads/asjuhgd'); ?>

      <div id="logo" class="c-x-12">
        <?php if ($logo_image_id = get_theme_option('custom_logo')): ?>
          <?php $image = wp_get_attachment_image_src($logo_image_id, 'large');?>
          <a href="<?php bloginfo('url')?>" title="<?php bloginfo('name')?>">
            <?php print get_nhafala_logo(); ?>
            <span class="tagline"><?php bloginfo('description');?></span>
          </a>
        <?php else: ?>
          <h1><?php print get_bloginfo('name')?></h1>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div>
  <div class="mobile-menu-switch">
    <span class="dashicons dashicons-menu"></span>
    <span class="dashicons dashicons-no-alt"></span>
  </div>
  <div id="navigation">
    <div class="container">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'top',
            'menu_class'  => 'menu'
          )
        );
      ?>
    </div>
  </div>
</div> <!-- /#header -->

<div id="content">
