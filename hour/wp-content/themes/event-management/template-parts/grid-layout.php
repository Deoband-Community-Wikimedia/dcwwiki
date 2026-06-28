<?php
/**
 * The template part for displaying grid layout
 * @package Event Management
 * @subpackage event_management
 * @since 1.0
 */
?>

<div class="col-lg-4 col-md-4 gridbox">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>   
    <?php if( get_theme_mod( 'event_management_post_featured_image',true) != '') { ?>
      <div class="box-image mb-3">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php }?>
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>  
    <div class="new-text">
    <?php $event_management_excerpt = get_the_excerpt(); echo esc_html( event_management_string_limit_words( $event_management_excerpt, esc_attr(get_theme_mod('event_management_post_excerpt_number','30')))); ?>  <?php echo esc_html( get_theme_mod('event_management_post_discription_suffix','[...]') ); ?>
    </div> 
    <?php if( get_theme_mod('event_management_button_text','View More') != ''){ ?>
      <div class="postbtn mt-4 text-start">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('event_management_button_text','View More'));?><i class="<?php echo esc_attr(get_theme_mod('event_management_button_icon','fas fa-long-arrow-alt-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('event_management_button_text','View More'));?></span></a>
      </div>
    <?php }?>
  </article>
</div>