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
            <span class="lang-wrap__span">Choose your language:</span>
            <ul>
                <li class="">AR</li>
                <li class="">EN</li>
            </ul>
        </div><!-- /.lang-wrap -->

        <?php
            wp_nav_menu(
                array(
                    'theme_location'	=> 'mobile',
                    'menu_id'			=> 'mobile-menu',
                    'container'       => '',
                    'menu_class'		=> 'mobile-menu-list list-reset',
                    'depth'				=> 2,
                )
            );
        ?>
    </div><!-- /.mobile-nav -->
</div><!-- /.mobile-nav__wrap -->