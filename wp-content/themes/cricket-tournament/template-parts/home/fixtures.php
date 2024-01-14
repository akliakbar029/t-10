<?php
/**
 * Template part for displaying fixture section
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

?>
<?php if(get_theme_mod('cricket_tournament_fixture_show_hide') != ''){ ?>
<section id="fixture">
  <div class="container">
    <?php if(get_theme_mod('cricket_tournament_fixture_shortcode')!=''){ ?>
       <div class="fixtures_shortcode">
         <?php echo do_shortcode(get_theme_mod('cricket_tournament_fixture_shortcode')); ?>
       </div>
     <?php } ?>
  </div>
</section>
<?php } ?>