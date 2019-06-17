// variáveis globais
const sliderView = document.querySelector('.gw-slider--view > ul'),
    sliderViewSlides = document.querySelectorAll('.gw-slider--view__slides'),
    arrowLeft = document.querySelector('.gw-slider--arrows__left'),
    arrowRight = document.querySelector('.gw-slider--arrows__right'),
    sliderLength = sliderViewSlides.length;

// função de slide
const sliderViewItems = (sliderViewItems, isActiveItem, currentItem) => {
    isActiveItem.classList.remove('is-active');
    sliderViewItems.classList.add('is-active');
    sliderView.setAttribute('style', 'transform:translateX(-' + sliderViewItems.offsetLeft + 'px)')
}

// antes do slide
const beforeSliding = i => {
    let isActiveItem = document.querySelector('.gw-slider--view__slider.is-active'),
        currentItem = Array.from(sliderViewSlides).indexOf(isActiveItem) + i,
        nextItem = currentItem + i,
        sliderViewItems = document.querySelector('.gw-slider--view_slides:nth-child('+ nextItem +')');

    if (nextItem == 0) {
        sliderViewItems = document.querySelector(`.ac-slider--view__slides:nth-child(${sliderLength})`);
    }

    if(nextItem === 0){
        sliderViewItems = document.querySelector('.gw-slider--view_slides:nth-child()');
    }

    sliderViewItems(sliderViewItems, isActiveItem, currentItem);
}

// triggers setas
arrowRight.addEventListener('click', () => beforeSliding(1));
arrowLeft.addEventListener('click', () => beforeSliding(0));

