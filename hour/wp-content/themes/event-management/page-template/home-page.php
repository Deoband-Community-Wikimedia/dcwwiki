<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main role="main" id="skip_content">
  <?php do_action( 'event_management_above_slider' ); ?>
  <?php if( get_theme_mod('event_management_slider_hide', false) != '' || get_theme_mod( 'event_management_display_slider',false) != ''){ ?>
    <section id="slider" class="m-auto p-0 mw-100">
      <?php $event_management_slider_speed = get_theme_mod('event_management_slider_speed', 3000); ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr($event_management_slider_speed); ?>"> 
        <?php $event_management_slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'event_management_slider_setting' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $event_management_slider_page[] = $mod;
            }
          }
          if( !empty($event_management_slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $event_management_slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <div class="slider-bg">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
                <?php } ?>
              </div>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <div class="carousel-content">
                    <div class="row">
                      <div class="col-lg-7 col-md-6 slider-content-img">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                        } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
                        <?php } ?>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <?php if( get_theme_mod('event_management_slider_heading',true) != ''){ ?>
                          <h1 class="mb-0"><?php the_title(); ?></h1>
                        <?php } ?>
                        <?php if( get_theme_mod('event_management_slider_text',true) != ''){ ?>
                          <p><?php $event_management_excerpt = get_the_excerpt(); echo esc_html( event_management_string_limit_words( $event_management_excerpt, esc_attr(get_theme_mod('event_management_slider_excerpt_number','15')))); ?></p>
                        <?php } ?>
                        <?php if (get_theme_mod( 'event_management_show_slider_button',true) != ''){ ?>
                          <div class="more-btn mt-0 mt-md-3">
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','event-management'); ?><i class="fas fa-chevron-right"></i></a>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
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
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','event-management' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','event-management' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'event_management_below_slider' ); ?>

  <?php if( get_theme_mod( 'event_management_ourevents_enable') != '') { ?>
    <section id="our-events">
      <div class="container">
        <div class="events-head">
          <?php if(get_theme_mod('event_management_events_small_title') != '') {?>
            <p class="small-head"><?php echo esc_html(get_theme_mod('event_management_events_small_title')); ?></p>
          <?php }?>
          <?php if(get_theme_mod('event_management_events_section_title') != '') {?>
            <h2><?php echo esc_html(get_theme_mod('event_management_events_section_title')); ?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php 
            $catData = get_theme_mod('event_management_ourevents');
            if($catData){              
            $page_query = new WP_Query(array(  'category_name' => esc_html( $catData ,'event-management')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?> 
              <div class="col-lg-4 col-md-4">
                <div class="text-content">
                  <div class="imagebox">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  </div>
                  <div class="event-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>">
                    <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
                    <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
                  <span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></div>
                  <div class="events-content">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php $event_management_excerpt = get_the_excerpt(); echo esc_html( event_management_string_limit_words( $event_management_excerpt, 10)); ?></p>
                  </div>
                </div>
              </div>             
            <?php endwhile;
            wp_reset_postdata();
            }?>
          <div class="clearfix"></div>
        </div>  
      </div>
    </section>
  <?php } ?> 

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>