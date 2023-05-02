<?php
/**
 * The template for displaying archive pages
 * 
 * @package rspl_base
 */


get_header(); ?>

    <?php if (has_nav_menu('tagsMenu')) : ?>
        <div class="container search-tags-wrap">
            <?php get_search_form(); ?>
            <div class="tags-nav-wrap">
            <span class="tags-nav__label">Filter by:</span>
                <?php 
                get_template_part( 'template-parts/tags-nav' );
                //get_template_part( 'template-parts/filter-tags' ); 
                ?>
            </div><!-- /.tags-nav-wrap -->
        </div><!-- /.container -->    
    <?php endif; ?>
    
    

<div class="container byo archive-main">

    <?php get_template_part( 'template-parts/category-nav' ); ?>
        
    
    <div class="articles-wrap">    
<!-- <div class="articles"> -->


        <?php if ( have_posts() ) : ?>
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post(); ?>


            

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
                <div class="post-thumbnail">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <a class="post-thumbnail__link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                            <?php
                            the_post_thumbnail(
                                'post-thumbnail',
                                array(
                                    'alt' => the_title_attribute(
                                        array(
                                            'echo' => false,
                                            )
                                        ),
                                        )
                                    );
                                    ?>
                        </a>
                    <?php 
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/post-thumbnail-bg.png'?>" class="" alt="<?php the_title(); ?>">
                    <?php
                    } ?>
                </div><!-- .post-thumbnail -->

               

                <div class="entry-title-wrap">
                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    <span class="entry-price">4.99 QAR</span>
                </div><!-- /.entry-title-wrap -->
                   

                


            </article><!-- #post-<?php the_ID(); ?> -->

            <?php endwhile;

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>
        <!-- </div> -->
        <!-- /.articles -->
    </div><!-- /.articles-wrap -->
</div><!-- /.container -->

<?php
get_footer();
