<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_kids_before_slider' ); ?>
  
  <section id="cate_slider">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="categry-title">
            <strong><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html_e('ALL CATEGORIES','vw-kids'); ?></strong>
          </div>
          <?php if(class_exists('woocommerce')){ ?>
            <div class="product-cat" id="style-2">
              <?php
                $args = array(                  
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => 0,
                  'parent'  => 0
                );
                $product_categories = get_terms( 'product_cat', $args );
                $count = count($product_categories);
                if ( $count > 0 ){
                    foreach ( $product_categories as $product_category ) {
                      $kids_cat_id   = $product_category->term_id;
                      $cat_link = get_category_link( $kids_cat_id );
                      if ($product_category->category_parent == 0) { ?>
                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                    <?php
                  }
                    echo esc_html( $product_category->name ); ?></a><i class="fas fa-caret-right"></i></li>
                    <?php
                    }
                  }
              ?>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-9 col-md-9">
          <?php if( get_theme_mod( 'vw_kids_slider_hide_show', true) == 1 || get_theme_mod( 'vw_kids_resp_slider_hide_show', true) == 1) { ?>
            <section id="slider">
              <?php if(get_theme_mod('vw_kids_slider_type', 'Default slider') == 'Default slider' ){ ?>
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_kids_slider_speed',4000)) ?>"> 
                <?php $vw_kids_slider_pages = array();
                  for ( $count = 1; $count <= 3; $count++ ) {
                    $mod = intval( get_theme_mod( 'vw_kids_slider_page' . $count ));
                    if ( 'page-none-selected' != $mod ) {
                      $vw_kids_slider_pages[] = $mod;
                    }
                  }
                  if( !empty($vw_kids_slider_pages) ) :
                    $args = array(
                      'post_type' => 'page',
                      'post__in' => $vw_kids_slider_pages,
                      'orderby' => 'post__in'
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                      $i = 1;
                ?>     
                <div class="carousel-inner" role="listbox">
                  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                      <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                      } else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                      <?php } ?>
                      <div class="carousel-caption">
                        <div class="inner_carousel">
                          <div class="small-slider-text">
                            <?php if( get_theme_mod('vw_kids_slider_small_text') != ''){ ?>
                              <p><?php echo esc_html(get_theme_mod('vw_kids_slider_small_text','')); ?></p>
                            <?php }?>
                          </div>
                          <?php if( get_theme_mod('vw_kids_slider_title_hide_show',true) == 1){ ?>
                            <h1 class="wow bounceInDown" data-wow-duration="3s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <hr>
                          <?php } ?>
                          <?php if( get_theme_mod('vw_kids_slider_content_hide_show',true) == 1){ ?>
                            <p class="wow bounceInDown" data-wow-duration="3s"><?php $vw_kids_excerpt = get_the_excerpt(); echo esc_html( vw_kids_string_limit_words( $vw_kids_excerpt, esc_attr(get_theme_mod('vw_kids_slider_excerpt_number','30')))); ?></p>
                          <?php } ?>
                          <?php if( get_theme_mod('vw_kids_slider_button_text','SHOP NOW') != ''){ ?>
                            <div class="more-btn wow bounceInDown" data-wow-duration="3s">
                              <a class="view-more" href="<?php echo esc_url(get_theme_mod('vw_kids_top_button_url',false));?>"><?php echo esc_html(get_theme_mod('vw_kids_slider_button_text',__('SHOP NOW','vw-kids')));?><i class="<?php echo esc_attr(get_theme_mod('vw_kids_slider_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_kids_slider_button_text',__('SHOP NOW','vw-kids')));?></span></a>
                            </div>
                          <?php } ?>
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
                <?php if(get_theme_mod('vw_kids_slider_arrow_hide_show', true)){?>
                  <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
                    <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('vw_kids_slider_prev_icon','fas fa-chevron-left')); ?>"></i></span>
                    <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-kids' );?></span>
                  </a>
                  <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
                    <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('vw_kids_slider_next_icon','fas fa-chevron-right')); ?>"></i></span>
                    <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-kids' );?></span>
                  </a>
                <?php }?>
              </div>
              <div class="clearfix"></div>
              <?php } else if(get_theme_mod('vw_kids_slider_type', 'Advance slider') == 'Advance slider'){?>
                <?php echo do_shortcode(get_theme_mod('vw_kids_advance_slider_shortcode')); ?>
              <?php } ?>
            </section>
          <?php } ?>
        </div>
      </div>    
    </div>
  </section>

  <?php do_action( 'vw_kids_after_slider' ); ?>

  <section id="popular-toys" class="wow bounceInUp delay-1000" data-wow-duration="2s">
    <div class="container">
      <?php $vw_kids_popular_page = array();
        $mod = absint( get_theme_mod( 'vw_kids_popular_product','vw-kids'));
        if ( 'page-none-selected' != $mod ) {
          $vw_kids_popular_page[] = $mod;
        }
        if( !empty($vw_kids_popular_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_kids_popular_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <strong><?php the_title(); ?></strong>
              <hr>
              <?php the_content(); ?>
            <?php $count++; endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata()
      ?>
    </div>  
  </section>

  <?php do_action( 'vw_kids_after_popular_toys' ); ?>

  <div class="content-vw entry-content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>