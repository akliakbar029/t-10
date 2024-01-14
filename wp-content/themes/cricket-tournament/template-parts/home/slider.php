<?php
/**
 * Template part for displaying slider section
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

?>
<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'cricket_tournament_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $cricket_tournament_slide_pages = array();
      for ( $cricket_tournament_count = 1; $cricket_tournament_count <= 4; $cricket_tournament_count++ ) {
        $cricket_tournament_mod = intval( get_theme_mod( 'cricket_tournament_slider_page' . $cricket_tournament_count ));
        if ( 'page-none-selected' != $cricket_tournament_mod ) {
          $cricket_tournament_slide_pages[] = $cricket_tournament_mod;
        }
      }
      if( !empty($cricket_tournament_slide_pages) ) :
        $cricket_tournament_args = array(
          'post_type' => 'page',
          'post__in' => $cricket_tournament_slide_pages,
          'orderby' => 'post__in'
        );
        $cricket_tournament_query = new WP_Query( $cricket_tournament_args );
        if ( $cricket_tournament_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $cricket_tournament_query->have_posts() ) : $cricket_tournament_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
               <img src="<?php (the_post_thumbnail_url('full')); ?>"/> <?php }else {echo ('<img src="'.$static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
              <p><?php echo wp_trim_words( get_the_content(),15 );?></p>
              <?php if( get_theme_mod( 'cricket_tournament_slider_button',true) != '' || get_theme_mod( 'cricket_tournament_slider_buttom_mob',true) != '') { ?>
                <div class="more-btn">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('View More','cricket-tournament'); ?></a>
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
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
