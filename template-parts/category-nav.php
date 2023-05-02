<?php

/**
 * Displays Category Navigation
 *
 * @package rspl_base
 */
?>

<nav class="category-nav list-reset" role="navigation" aria-label="<?php esc_attr_e('Category Navigation', 'rspl_theme'); ?>">
    <?php if (has_nav_menu('catMenu')) :
        wp_nav_menu(
            array(
                'theme_location'    => 'catMenu',
                'menu_class'		=> 'category-nav-list list-reset',
                'container'         => '',
                'depth'             => 1,
            )
        );
    endif;
    ?>
</nav><!-- .category-nav -->