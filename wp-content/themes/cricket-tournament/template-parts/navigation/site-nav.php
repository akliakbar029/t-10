<?php
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-12 col-md-10 col-8 align-self-center">
	      		<div class="innermenubox">
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="cricket_tournament_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','cricket-tournament'); ?></span></button>
	          			</div>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'cricket-tournament' ); ?>">
			              	<?php {
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	} ?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="cricket_tournament_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','cricket-tournament'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	    </div>
  	</div>
</div>
