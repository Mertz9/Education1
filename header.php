<?php
/**
 * The header for our theme 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'iqra-education' ) ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	  wp_body_open(); 
	} else { 
	  do_action( 'wp_body_open' ); 
	} ?>	
	<?php if(get_theme_mod('iqra_education_loader_setting',true)){ ?>
	    <div id="pre-loader">
	      	<div class='demo'>
		        <?php $iqra_education_theme_lay = get_theme_mod( 'iqra_education_preloader_types','Default');
		        if($iqra_education_theme_lay == 'Default'){ ?>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		        <?php }elseif($iqra_education_theme_lay == 'Circle'){ ?>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		        <?php }elseif($iqra_education_theme_lay == 'Two Circle'){ ?>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		          <div class='circle'>
		            <div class='inner'></div>
		          </div>
		        <?php } ?>
	      	</div>
	    </div>
	<?php }?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'iqra-education' ); ?></a>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="main-header">
				<div class="container">
					<div class="row">
					<div class="logo col-lg-3 col-md-12">
						<?php if ( has_custom_logo() ) : ?>
						  <div class="site-logo"><?php the_custom_logo(); ?></div>
						  <?php else: ?>
						  <?php $blog_info = get_bloginfo( 'name' ); ?>
						  <?php if ( ! empty( $blog_info ) ) : ?>
						  	<?php if( get_theme_mod('iqra_education_show_site_title',true) != ''){ ?>
							    <?php if ( is_front_page() && is_home() ) : ?>
							      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							    <?php else : ?>
							      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							    <?php endif; ?>
							<?php }?>
							<?php endif; ?>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
							?>
							<?php if( get_theme_mod('iqra_education_show_tagline',true) != ''){ ?>
								<p class="site-description">
								    <?php echo esc_html($description); ?>
								</p>
							<?php }?>
						<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="col-lg-9 col-md-12 p-0">
						<?php if( get_theme_mod('iqra_education_show_hide_topbar') != '' || get_theme_mod('iqra_education_enable_disable_topbar') != ''){ ?>
							<div class="topbar">
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<?php if( get_theme_mod( 'iqra_education_contact_number','' ) != '') { ?>
							                <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('iqra_education_contact_number','' )); ?></span>
							            <?php } ?>
									</div>
									<div class="col-lg-3 col-md-6">
							            <?php if( get_theme_mod( 'iqra_education_email_address','' ) != '') { ?>
							                <span class="email"><i class="far fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('iqra_education_email_address','') ); ?></span>
							            <?php } ?>
							        </div>
							        <div class="col-lg-4 col-md-6">
							            <?php if( get_theme_mod( 'iqra_education_time','' ) != '') { ?>
							                <span class="time"><i class="far fa-clock" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('iqra_education_time','') ); ?></span>
							            <?php } ?>
							        </div>
									<div class="social-icon col-lg-2 col-md-6">
										<?php if( get_theme_mod( 'iqra_education_facebook_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'iqra_education_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','iqra-education' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'iqra_education_twitter_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'iqra_education_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','iqra-education' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'iqra_education_youtube_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'iqra_education_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','iqra-education' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'iqra_education_linkedin_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'iqra_education_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','iqra-education' );?></span></a>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if ( has_nav_menu( 'top' ) ) : ?>
							<div class="navigation-top">
								<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				</div>
			</div>
		</header>
		
	<div class="site-content-contain">
		<div id="content">