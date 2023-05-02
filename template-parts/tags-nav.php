<?php

/**
 * Displays Tags Navigation
 *
 * @package rspl_base
 */
?>

<!-- <nav class="tags-nav list-reset" role="navigation" aria-label="<?php // esc_attr_e('Tags Navigation', 'rspl_theme'); ?>"> -->
    <?php
        wp_nav_menu(
            array(
                'theme_location'    => 'tagsMenu',
                // 'menu_id'			=> 'tagsMenu',
                'menu_class'		=> 'tags-nav-list list-reset',
                'depth'             => 1,
                'container'         => '',
            )
        );
    ?>
<!-- </nav> -->
<!-- .tags-nav -->