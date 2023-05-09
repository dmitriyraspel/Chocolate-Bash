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

	<footer id="colophon" class="site-footer site-footer--margin">
		<div class="footer__inner">

			<?php //get_sidebar() ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>

			
			<section class="widget manual">
				<?php
					if ( has_nav_menu( 'social' ) ) : ?>
					<h4><?php __( 'Let’s Connect:', 'rspl_theme' ); ?></h4>
					<?php
						get_template_part( 'template-parts/social-nav' );
					endif; 
					?>
			</section><!-- /.widget -->
			
		</div><!-- .footer__inner -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
