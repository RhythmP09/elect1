<?php 
/*
* Display Top Bar
*/
?>
<?php if( get_theme_mod('print_shop_show_topbar', false) != false){ ?>
  <div class="top-header">
    <div class="row">
      <div class="col-lg-5 col-md-12 text-center align-self-center">
        <?php if(get_theme_mod('print_shop_topbar_text') != ''){ ?>
          <p class="topbar-text"><?php echo esc_html(get_theme_mod('print_shop_topbar_text')); ?></p>
        <?php }?>
      </div>
      <div class="col-lg-5 col-md-6 align-self-center contact-detail">
        <?php if( get_theme_mod( 'print_shop_timings' ) != '') { ?>
          <p class="text-center"><i class="far fa-clock me-2"></i><?php echo esc_html( get_theme_mod('print_shop_timings') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-6 align-self-center ps-md-0">
        <div class="social-icons text-center">
          <?php if(get_theme_mod('print_shop_facebook_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('print_shop_facebook_url')); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'print-shop'); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('print_shop_twitter_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('print_shop_twitter_url')); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'print-shop'); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('print_shop_instagram_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('print_shop_instagram_url')); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'print-shop'); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('print_shop_telegram_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('print_shop_telegram_url')); ?>" target="_blank"><i class="fab fa-telegram-plane"></i><span class="screen-reader-text"><?php echo esc_html('Telegram', 'print-shop'); ?></span></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
<?php }?>