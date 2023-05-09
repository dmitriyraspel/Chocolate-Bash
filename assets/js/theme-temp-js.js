document.addEventListener('DOMContentLoaded', () => {

    const homeSlider = document.getElementById('homeSlider');
    if ( homeSlider ) {
        pageSliderInit( homeSlider );
    }

    const reviewsSlider = document.getElementById('reviews');
    if ( reviewsSlider ) {
        pageSliderInit( reviewsSlider );
    }

    const mapsWrap = document.getElementById('mapsWrap');
    if ( mapsWrap) {
        mapsWrap.addEventListener('click', mapsWrapInit, {once: true})
    }

    const franchiseSlider = document.getElementById('franchiseSlider');
    if ( franchiseSlider ) {
        franchiseSlider.classList.add('--slider--active');
        ItcSlider.getOrCreateInstance(franchiseSlider);
    }

    const locationSection = document.getElementById('locationSection');
    if ( locationSection ) {
        locationSectionChange();
    }
    
    

    

    if (document.forms) {
        for (let i = 0; i < document.forms.length; i++) {
            let form = document.forms[i];
            let slideBtn = form.querySelector('.slide-to-submit');
            if ( slideBtn ) {
                formSubmitToSlide(form, slideBtn);
                slideFormCheckSubmit(form);
            }
        }
    }
});


function pageSliderInit(sliderName) {
    
    let testWidth = 
            window.innerWidth && document.documentElement.clientWidth ? 
            Math.min(window.innerWidth, document.documentElement.clientWidth) : 
            window.innerWidth || 
            document.documentElement.clientWidth || 
            document.getElementsByTagName('body')[0].clientWidth;
    if ( testWidth <= 768 ) {
        sliderName.classList.add('--slider--active');
        ItcSlider.getOrCreateInstance(sliderName);
    } 
}

function mapsWrapInit() {
    const mapLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24241.65052069386!2d51.5048307131409!3d25.42010670483711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45c30ab2494169%3A0xeec793ab686ff6db!2sPlace%20Vend%C3%B4me%20Mall!5e0!3m2!1sru!2sru!4v1682849741430!5m2!1sru!2sru" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    const mapsWrapWidth = mapsWrap.offsetWidth;
    const mapsWrapHeight = mapsWrap.offsetHeight;
    const mapsWrapCss = `width:` + mapsWrapWidth + `px; height:` + mapsWrapHeight + `px;padding-top: 30px;`;
    mapsWrap.style.cssText = mapsWrapCss;
    // mapsWrap.classList.remove('--bg-img');
    mapsWrap.innerHTML = mapLink;
}

function formSubmitToSlide(form, slideBtn) {
    submitBtn = form.querySelector('.contact-us-form_submit');
    
    slideBtn.addEventListener('input', function() {
        if (this.value >= 100 ) {
            submitBtn.click();
            
            setTimeout(() => {
                this.value = 0;
            }, 300);
        }
    }, false);
}

function slideFormCheckSubmit(form) {
    form.addEventListener('submit', function() {
        setTimeout(() => {
            slideFormClosePopUp(form);
        }, 5000);
    });
}

function slideFormClosePopUp(form) {
    let popUpCloseLinks = form.querySelectorAll('.close-parent-link');
    for ( const link of popUpCloseLinks ) {
        link.addEventListener('click', function() {
            event.preventDefault();
            link.parentElement.remove();
        }, false)
    }
}



function locationSectionChange() { 
    let locationAmericaToogle   = document.getElementById('locationAmericaToogle');
    let locationAsiaToogle      = document.getElementById( 'locationAsiaToogle' );
    let locationAmericaContent  = document.getElementById( 'locationAmericaContent');
    let locationAsiaContent     = document.getElementById( 'locationAsiaContent' );

    locationAmericaToogle.addEventListener('click', ()=> {
        locationAmericaToogle.classList.add('location-region--current');
        locationAsiaToogle.classList.remove('location-region--current');
        locationAmericaContent.classList.add('location-card-wrap--active');
        locationAsiaContent.classList.remove('location-card-wrap--active');
    })
    locationAsiaToogle.addEventListener('click', ()=> {
        locationAmericaToogle.classList.remove('location-region--current');
        locationAsiaToogle.classList.add('location-region--current');
        locationAmericaContent.classList.remove('location-card-wrap--active');
        locationAsiaContent.classList.add('location-card-wrap--active');
    })
}


