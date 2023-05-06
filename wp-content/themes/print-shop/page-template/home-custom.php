<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'print_shop_above_slider' ); ?>

  <?php if( get_theme_mod('print_shop_slider_hide_show', false) != ''){ ?> 
    <section id="slider" class="m-0 p-0 mw-100">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $print_shop_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'print_shop_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $print_shop_content_pages[] = $mod;
            }
          }
          if( !empty($print_shop_content_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $print_shop_content_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1>
                    <?php
                    $thetitle = $post->post_title;
                    $getlength = strlen($thetitle);
                    $thelength = 50;
                    echo esc_html(substr($thetitle, 0, $thelength));
                    if ($getlength > $thelength) echo "...";
                    ?>
                  </h1>
                  <p class="my-2"><?php $print_shop_excerpt = get_the_excerpt(); echo esc_html( print_shop_string_limit_words( $print_shop_excerpt,20 ) ); ?></p>
                  <div class="read-btn mt-4 mb-3">
                  <?php if(get_theme_mod('print_shop_slider_btn_url1') != '' || get_theme_mod('print_shop_slider_btn_text1') != ''){?>
                      <a href="<?php echo esc_url(get_theme_mod('print_shop_slider_btn_url1')); ?>" class="ms-3"><span><?php echo esc_html( get_theme_mod('print_shop_slider_btn_text1') ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('print_shop_slider_btn_text1') );?></span></a>
                    <?php }?>
                    <?php if(get_theme_mod('print_shop_slider_btn_url2') != '' || get_theme_mod('print_shop_slider_btn_text2') != ''){?>
                      <a href="<?php echo esc_url(get_theme_mod('print_shop_slider_btn_url2')); ?>" class="ms-3"><span><?php echo esc_html( get_theme_mod('print_shop_slider_btn_text2') ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('print_shop_slider_btn_text2') );?></span></a>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'print-shop' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next', 'print-shop' );?></span>
        </a>
      </div>   
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'print_shop_below_slider' ); ?>

  <?php if( get_theme_mod('print_shop_section_title') != '' || get_theme_mod('print_shop_service_category') != ''){ ?>
    <section id="service-section" class="pt-5 pb-4">
      <div class="container">     
        <div class="service-head mb-5 text-center">
          <?php if( get_theme_mod('print_shop_section_title') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('print_shop_section_title')); ?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php $print_shop_catData =  get_theme_mod('print_shop_service_category');
          if($print_shop_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($print_shop_catData,'print-shop'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
              <div class="col-lg-3 col-md-6 px-2">
                <div class="service-box mb-4">
                  <div class="service-img">
                   <?php the_post_thumbnail(); ?>
                 </div>
                  <div class="service-content">
                    <?php if( get_post_meta($post->ID, 'print_shop_icon', true) ) {?>
                      <i class="<?php echo esc_attr(get_post_meta($post->ID,'print_shop_icon', 'fas fa-print')); ?>"></i>
                    <?php }?>
                    <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                  </div>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'print_shop_below_best_sellers' ); ?>

  <div class="container entry-content py-4">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>
<?php get_footer(); ?>