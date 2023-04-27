<?php
/**
 * Displays Mobile menu
 *
 * @package rspl_base
 */
?>
<div id="mobileNavWrap" class="mobile-nav__wrap">
    <div class="mobile-nav">
        
        <img class="mobile-nav__img" src="<?php echo get_template_directory_uri() . '/assets/img/mob-nav-img.jpg'?>" alt="">
        
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

        <?php
        if ( has_nav_menu( 'mobile' ) ) : 
            wp_nav_menu(
                array(
                    'theme_location'	=> 'mobile',
                    'menu_id'			=> 'mobile-menu',
                    'container'       => '',
                    'menu_class'		=> 'mobile-menu-list list-reset',
                    'depth'				=> 2,
                )
            );
        endif;
        ?>
    </div><!-- /.mobile-nav -->
</div><!-- /.mobile-nav__wrap -->