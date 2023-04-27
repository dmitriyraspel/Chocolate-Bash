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
		<div class="footer__bg">
			<img class="footer__bg-img only-mobile" src="<?php echo get_template_directory_uri() . '/assets/img/footer-bg-mobile.svg'?>" alt="footer-background">
			<img class="footer__bg-img no-mobile" src="<?php echo get_template_directory_uri() . '/assets/img/footer-bg.svg'?>" alt="footer-background">
		</div>
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
