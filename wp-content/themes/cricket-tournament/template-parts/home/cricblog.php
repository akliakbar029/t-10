<?php
/**
 * Template part for displaying cric-blog section
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

?>
<?php if(get_theme_mod('cricket_tournament_blog_show_hide') != ''){ ?>
<section id="static-blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <?php
          $cricket_tournament_postdata = get_theme_mod('cricket_tournament_static_blog_1');
            if($cricket_tournament_postdata){
            $cricket_tournament_args = array( 'name' => esc_html( $cricket_tournament_postdata ,'cricket-tournament'));
          $cricket_tournament_query = new WP_Query( $cricket_tournament_args );
          if ( $cricket_tournament_query->have_posts() ) :
            while ( $cricket_tournament_query->have_posts() ) : $cricket_tournament_query->the_post(); ?>
              	<img class="static-img" src="<?php (the_post_thumbnail_url('full')); ?>"/>
                <div class="cricblog-info">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php if(get_theme_mod('cricket_tournament_remove_date',true) != ''){ ?>
	                <div class="dateday"><?php echo get_the_date( 'j F, Y' ); ?></div>
              <?php }?>
               </div>
            <?php endwhile;
            wp_reset_postdata();?>
            <?php else : ?>
            <div class="no-postfound"></div>
          <?php
        endif; }?>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="pull-up-box">
          <div class="owl-carousel">
            <?php
              $cricket_tournament_post_category = get_theme_mod('cricket_tournament_capture_photograph_section_category');
              if($cricket_tournament_post_category){
                $cricket_tournament_page_query = new WP_Query(array( 'category_name' => esc_html( $cricket_tournament_post_category ,'cricket-tournament')));?>
                <?php while( $cricket_tournament_page_query->have_posts() ) : $cricket_tournament_page_query->the_post(); ?>
                <div class="cricbox">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  <div class="cricbox-detail px-3">
                    <h6 class="mt-3 cric-category"><?php the_category(); ?></h6>
                    <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <?php if(get_theme_mod('cricket_tournament_remove_date',true) != ''){ ?>
                    <div class="dateday"><?php echo get_the_date( 'j F, Y' ); ?></div>
                    <?php }?>
                  </div>
                </div>
                <?php endwhile;
                wp_reset_postdata();
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }?>