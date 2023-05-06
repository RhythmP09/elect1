<?php
/**
 * Displaying Search Results pages.
 * @package Print Shop
 * @subpackage print-shop
 * @since 1.0
 */

get_header(); ?>

<main id="main" role="main">
    <div class="post-wrapper mt-5">
        <div class="container">
            <div class="row">
                <?php
                $print_shop_layout = get_theme_mod( 'print_shop_theme_options','Right Sidebar');
                if($print_shop_layout == 'One Column'){?>
                    <div id="firstbox">
                        <?php if ( have_posts() ) : ?>
                            <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                            <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                              get_template_part( 'template-parts/post/content',get_post_format() ); 
                            endwhile;
                            else : ?>
                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                <?php
                                get_search_form();
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                    'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php }else if($print_shop_layout == 'Three Columns'){?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="firstbox" class="col-lg-6 col-md-6">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                              <?php
                                  // Previous/next page navigation.
                                  the_posts_pagination( array(
                                      'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                      'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                  ) );
                              ?>
                            </div>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    </div>
                <?php }else if($print_shop_layout == 'Four Columns'){?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="firstbox" class="col-lg-3 col-md-3">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                        'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
                    </div>
                <?php }else if($print_shop_layout == 'Right Sidebar'){?>
                    <div class="row">
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                        'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                    </div>
                <?php }else if($print_shop_layout == 'Left Sidebar'){?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                        'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }else if($print_shop_layout == 'Grid Layout'){?>
                    <div id="firstbox">
                        <?php if ( have_posts() ) : ?>
                            <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                            <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                        <?php endif; ?>
                        <div class="row">
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/grid-layout' ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                        </div>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                    'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                <?php }else {?>
                    <div class="row">
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','print-shop'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'print-shop' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content' ,get_post_format()); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'print-shop' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'print-shop' ),
                                        'next_text'          => esc_html__( 'Next page', 'print-shop' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'print-shop' ) . ' </span>',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>