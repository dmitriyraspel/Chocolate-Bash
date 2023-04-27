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

		<div id="mobileNavToggle" class="mobile-nav-toggle">
			<span class="screen-reader-text"><?php esc_html_e( 'Mobile Menu', 'rspl_theme' ); ?></span>
			<div class="burger">
				<span class="burger__inner"></span>
			</div>
		</div>
			
			<?php if ( has_nav_menu( 'header' ) ) { ?>
				<nav id="site-navigation" class="header-menu-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location'	=> 'header',
								'menu_id'			=> 'header-menu',
								// 'container_class'	=> 'primary-menu-container',
								'container'       => '',
								'menu_class'		=> 'header-menu-list list-reset',
								'depth'				=> 2,
							)
						);
						?>
				</nav><!-- #site-navigation -->
			<?php } ?>

			<?php // get_template_part('template-parts/header/site-branding'); ?>
			<div class="site-branding">
				<div class="site-logo">
					<?php if ( is_front_page() || is_home() ) : ?>
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
					<span class="lang-wrap__span no-ar">Choose your language:</span>
					<span class="lang-wrap__span only-ar">اختر لغتك:</span>
					<ul>
						<?php if ( function_exists( 'pll_the_languages' ) ) :
							pll_the_languages( array('display_names_as'	=> 'slug') );
						else : ?>
							<li class="lang-item lang-item-4 lang-item-en current-lang lang-item-first"><a lang="en-US" hreflang="en-US" href="#">en</a></li>
							<li class="lang-item lang-item-7 lang-item-ar"><a lang="ar" hreflang="ar" href="#">ar</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- /.lang-wrap -->
				
				<button class="site-header__cta-button">Explore our menu</button>
			</div><!-- /.site-header__extras -->

			
		</div><!-- .header__inner -->

		<?php get_template_part( 'template-parts/mobile-nav' ); ?>
		
		<div class="header_bg-wrap no-mobile"></div>
	</header><!-- #masthead -->
	
	<main id="primary" class="site-main">