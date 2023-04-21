<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rspl_base
 */

?>

</main><!-- #main -->

	<footer id="colophon" class="site-footer">
		<div class="footer__inner">

			<?php get_sidebar() ?>

			<?php
				if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'rspl_theme' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'footer',
							'menu_class'		=> 'footer-menu list-reset',
							'depth'				=> 1,
							'container'       => '',
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>

			<?php
			if ( has_nav_menu( 'social' ) ) : 
				get_template_part( 'template-parts/social-nav' );
			endif; 
			?>
		</div><!-- .footer__inner -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
