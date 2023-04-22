<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rspl_base
 */

get_header();
?>
		<section class="error-404 not-found ">
			<div class="page-content">
				<img class="page404__img" src="<?php echo get_template_directory_uri() . '/assets/img/undraw_taken_re_yn20 1.png' ?>" alt="">
				<h1 class="page-title aligncenter"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rspl_theme' ); ?></h1>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

<?php
get_footer();
