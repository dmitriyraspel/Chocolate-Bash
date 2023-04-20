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
		
		<?php get_template_part('template-parts/header/site-branding'); ?>

		<?php if ( has_nav_menu( 'primary' ) ) { ?>
			<nav id="site-navigation" class="main-navigation">

				<button id="site-navigation-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'rspl_theme' ); ?></span>
					<div class="burger">
						<span class="burger__inner"></span>
					</div>
				</button>

				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'primary',
						'menu_id'			=> 'primary-menu',
						'container_class'	=> 'primary-menu-container',
						'menu_class'		=> 'primary-menu-list list-reset',
						'depth'				=> 2,
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php } ?>


		
	</div><!-- .header__inner -->
	</header><!-- #masthead -->
	
	<main id="primary" class="site-main">