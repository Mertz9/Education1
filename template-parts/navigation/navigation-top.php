<?php
/**
 * Displays top navigation
 */
?>

<div class="header-menu <?php if( get_theme_mod( 'iqra_education_fixed_header', false) != '' || get_theme_mod( 'iqra_education_enable_disable_fixed_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
	<div class="row m-0">
		<div class="<?php if( get_theme_mod( 'iqra_education_login_url') != '') { ?>col-lg-9 col-md-8"<?php } else { ?>col-lg-11 col-md-11 <?php } ?>">
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'iqra-education' ); ?>">
				<button role="tab" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
					<?php
						esc_html_e( 'Menu', 'iqra-education' );
					?>
				</button>

				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
				) ); ?>				
			</nav>
		</div>
		<div class="col-lg-1 col-md-1">
			<div class="search-box">
				<a href="#" onclick="iqra_education_search_open()" ><i class="fas fa-search"></i>
		     		<span class="screen-reader-text"><?php esc_html_e( 'Search','iqra-education' );?></span>
		     	</a>
		    </div>
		</div>
		<div class="serach_outer">
		    <div class="serach_inner">
		      <?php get_search_form(); ?>
		    </div>
		    <a href="#main" onclick="iqra_education_search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','iqra-education' );?></span></a>
		</div>
      	<?php if( get_theme_mod( 'iqra_education_login_url') != '') { ?>
			<div class="account col-lg-2 col-md-3">
            	<a href="<?php echo esc_html(get_theme_mod('iqra_education_login_url',''));?>"><i class="fas fa-user"></i><?php esc_html_e('Login / Register','iqra-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','iqra-education' );?></span></a>
			</div>
        <?php } ?>
	</div>
</div>