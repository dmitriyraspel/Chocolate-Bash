document.addEventListener('DOMContentLoaded', () => {
    
    homeSliderInit ();
    storySliderInit();

    window.onresize = () => {
        homeSliderInit ();
        storySliderInit();
    }
    
});

function homeSliderInit () {
    const homeSlider = document.getElementById('homeSlider');
    if (! homeSlider) {
        return;        
    }
    let testWidth = 
            window.innerWidth && document.documentElement.clientWidth ? 
            Math.min(window.innerWidth, document.documentElement.clientWidth) : 
            window.innerWidth || 
            document.documentElement.clientWidth || 
            document.getElementsByTagName('body')[0].clientWidth;
    if ( testWidth <= 760 ) {
        homeSlider.classList.add('slider_mobile');
        ItcSlider.getOrCreateInstance(homeSlider);
    } else {
        homeSlider.classList.remove('slider_mobile');
    }
    // console.log('homeSliderInit');
}

function storySliderInit() {
    const reviewsSlider = document.getElementById('reviews');
    if (! reviewsSlider) {
        return;        
    }
    let testWidth = 
            window.innerWidth && document.documentElement.clientWidth ? 
            Math.min(window.innerWidth, document.documentElement.clientWidth) : 
            window.innerWidth || 
            document.documentElement.clientWidth || 
            document.getElementsByTagName('body')[0].clientWidth;
    if ( testWidth <= 760 ) {
        reviewsSlider.classList.add('slider--active');
        ItcSlider.getOrCreateInstance(reviewsSlider);
    } 
    // console.log('homeSliderInit');
}