<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rspl_base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rspl_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header__inner">
			
			<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<nav id="site-navigation" class="main-navigation">

					<button id="site-navigation-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'rspl_theme' ); ?></span>
						<div class="burger">
							<span class="burger__inner"></span>
						</div>
					</button>

					<div class="primary-menu-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location'	=> 'primary',
								'menu_id'			=> 'primary-menu',
								// 'container_class'	=> 'primary-menu-container',
								'container'       => '',
								'menu_class'		=> 'primary-menu-list list-reset',
								'depth'				=> 2,
							)
						);
						?>

						<?php
							if ( has_nav_menu( 'social' ) ) : 
								get_template_part( 'template-parts/social-nav' );
							endif; 
						?>
					</div><!-- /.primary-menu-container -->

					
				</nav><!-- #site-navigation -->
			<?php } ?>

			<?php // get_template_part('template-parts/header/site-branding'); ?>
			<div class="site-branding">
				<div class="site-logo">
					<?php if ( is_front_page() && is_home() ) : ?>
							<img src="<?php echo get_template_directory_uri() . '/assets/img/chocolate-bash-logo-mobile.png'?>" class="custom-logo only-mobile" alt="<?php bloginfo( 'name' ); ?>">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/chocolate-bash-logo.png'?>" class="custom-logo no-mobile" alt="<?php bloginfo( 'name' ); ?>">
						<?php
					else :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" aria-current="page">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/chocolate-bash-logo-mobile.png'?>" class="custom-logo only-mobile" alt="<?php bloginfo( 'name' ); ?>">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/chocolate-bash-logo.png'?>" class="custom-logo no-mobile" alt="<?php bloginfo( 'name' ); ?>">
						</a>
						<?php
					endif; ?>
				</div><!-- .site-logo -->
			</div><!-- .site-branding -->

			
			<div class="site-header__extras">
				<div class="lang-wrap">
					<span class="site-header__lang__text">Choose your language:</span>
					<button class="site-header__lang__btn site-header__lang__btn-1">AR</button>
					<button class="site-header__lang__btn site-header__lang__btn-2">EN</button>
				</div><!-- /.lang-wrap -->
					<button class="site-header__cta-button">Explore our menu</button>
			</div><!-- /.site-header__extras -->

			
		</div><!-- .header__inner -->
		<div class="header_bg-wrap no-mobile"></div>
	</header><!-- #masthead -->
	
	<main id="primary" class="site-main">