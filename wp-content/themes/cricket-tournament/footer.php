<?php
/**
 * The template for displaying the footer
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

?>

		</div>
		<footer id="footer" class="site-footer" role="contentinfo">
			<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );
				get_template_part( 'template-parts/footer/site', 'info' );
			?>
			<?php if( get_theme_mod( 'cricket_tournament_return_to_header',true) != '' || get_theme_mod( 'cricket_tournament_return_to_header_mob',false) != '') { ?>
				<div class="return-to-header">
					<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>
				</div>
			<?php }?>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
