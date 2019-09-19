<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="<?= WPB5_COLOR ?>">

    <link rel="icon" type="icon" href="<?= WPB5_ASSETS ?>/img/logo.jpg">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="mainHeader">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="<?= get_home_url() ?>">
            <img src="<?= WPB5_ASSETS ?>/img/logo.jpg" alt=""> Wefere Calendar
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#MainNavbar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <div class="collapse navbar-collapse" id="MainNavbar">
            <?php wp_nav_menu( array(
              'menu'              => 'wpb5-main',
              'theme_location'    => 'wpb5-main',
              'depth'             => 1,
              'container'			=> false,
              'menu_class'        => 'navbar-nav ml-auto',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker()
              ));
            ?>
            <?php if(is_user_logged_in()): ?>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?= wp_logout_url( home_url() ) ?>'"><i class="fas fa-sign-out"></i> Cerrar Sesión</a></li>
              </ul>
            <?php endif; ?>
          </div>
        </nav>
      </div>
    </header>
    <main>
