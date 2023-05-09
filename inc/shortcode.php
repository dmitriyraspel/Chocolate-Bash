<?php

defined( 'ABSPATH' ) || exit;

add_shortcode( 'chokolate_craving_section', 'chokolate_craving_section_callback' );


function chokolate_craving_section_callback() {
  
    $craving__img = get_template_directory_uri() . '/assets/img/pre-footer.svg';
    $craving__delivery = get_template_directory_uri() . '/assets/img/DELIVERY.svg';
    $craving__pickup = get_template_directory_uri() . '/assets/img/PICKUP.svg';
    $craving__catering = get_template_directory_uri() . '/assets/img/CATERING.svg';
    $craving__gifts = get_template_directory_uri() . '/assets/img/GIFTS.svg';

    $html = '
   
    <div class="craving">
        <figure class="craving__img">
            <img src=" ' . $craving__img . '" alt="">
        </figure>
        <p class="craving__desc">Whether you\'re in need of dessert delivery, pickup, catering, or just want to treat someone special to the most delicious of gifts, we make it easy to order your chocolaty treat of choice right here.</p>

        <a href="#" class="craving__link">Order now </a>
        <div class="craving__items">
            <div class="craving__item">
                <img src="' . $craving__delivery . '" alt="" class="craving__item-img">
                <h4 class="craving__item-title">DELIVERY</h4>
            </div>
            <div class="craving__item">
                <img src="' . $craving__pickup . '" alt="" class="craving__item-img">
                <h4 class="craving__item-title"> PICKUP</h4>
            </div>
            <div class="craving__item">
                <img src="' . $craving__catering . '" alt="" class="craving__item-img">
                <h4 class="craving__item-title">CATERING</h4>
            </div>
            <div class="craving__item">
                <img src="' . $craving__gifts . '" alt="" class="craving__item-img">
                <h4 class="craving__item-title">GIFTS</h4>
            </div>
        </div>
    </div><!-- /.craving -->
   
    ';

    return $html;
}