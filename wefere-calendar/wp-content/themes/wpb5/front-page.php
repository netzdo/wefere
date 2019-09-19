<?php /* Template name: Home */ get_header() ?>
<div class="front-banner" data-background="<?= WPB5_ASSETS ?>/img/banner.png" data-background-size="cover">

</div>
  <div class="text-center py-4 my-3">
    <?php if(is_user_logged_in()):
      $current_user = wp_get_current_user();
      echo '<a href="'.get_author_posts_url($current_user->ID).'" class="btn btn-primary">Ver Calendario Waffle</a>';
    else:
      ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mx-auto">
            <div class="login-form">
              <?= wp_login_form() ?>
            </div>
          </div>
        </div>
      </div>

      <?php
    endif; ?>
  </div>
<?php get_footer() ?>
