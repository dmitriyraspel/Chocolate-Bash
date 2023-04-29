document.addEventListener('DOMContentLoaded', () => {
    
    homeSliderInit ();

    window.onresize = () => {
        homeSliderInit ();
    }
    
});

function homeSliderInit () {
    const homeSlider = document.getElementById('homeSlider');
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
