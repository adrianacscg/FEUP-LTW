const slider = sliderElement => {

    let pages = [];
    let currentSlide = 1;
    let isChanging = false;
    let keyUp = {
        38: 1,
        33: 1
    };
    let keyDown = {
        40: 1,
        34: 1
    };

    const init = () => {

        /* VERTICAL SLIDER */ 

        document.body.classList.add('slider-body');

        
        /* Handle wheel scrolling */

        whatWheel = 'onwheel' in document.createElement('div') ? 'wheel' : document.onmousewheel !== undefined ? 'mousewheel' : 'DOMMouseScroll';
        
        window.addEventListener(whatWheel, e => {

            let direction = e.wheelDelta || e.deltaY;

            if (direction > 0) {
                changeSlide(-1);
            }
            else {
                changeSlide(1);
            }
        });


        /* Handle keyboard input*/

        window.addEventListener('keydown', e => {

            if (keyUp[e.keyCode]) {
                changeSlide(-1);
            } 
            else if (keyDown[e.keyCode]) {
                changeSlide(1);
            }
        });


        /* Page change animation complete */

        detectChangeEnd() && document.querySelector(sliderElement).addEventListener(detectChangeEnd(), () => {
            
            if (isChanging) {

                setTimeout( () => {
                    
                    isChanging = false;
                    window.location.hash = document.querySelector(`[data-slider-index="${currentSlide}"]`).id;
                }, 400);
            }
        });


        /* Set up page and render bullets */

        document.querySelector(sliderElement).classList.add('slider-container');
        let bulletsContainer = document.createElement('div');
        bulletsContainer.classList.add('slider-bullets');

        let index = 1;
        [].forEach.call(document.querySelectorAll(sliderElement + ' > *'), section => {

            let bullet = document.createElement('a');
            bullet.classList.add('slider-bullet');
            bullet.setAttribute('data-slider-target-index', index);
            bulletsContainer.appendChild(bullet);

            section.classList.add('slider-page');
            pages.push(section);
            section.setAttribute('data-slider-index', index++);
        });

        document.body.appendChild(bulletsContainer);
        document.querySelector(`a[data-slider-target-index="${currentSlide}"]`).classList.add('slider-bullet-active');


        /* Touch Screen Handling */

        let touchStartPos = 0;
        let touchStopPos = 0;
        let touchMinLength = 90;

        document.addEventListener('touchstart', e => {

            e.preventDefault();

            if (e.type == 'touchstart' || e.type == 'touchmove' || e.type == 'touchend' || e.type == 'touchcancel') {
                
                let touch = e.touches[0] || e.changedTouches[0];
                touchStartPos = touch.pageY;
            }
        });

        document.addEventListener('touchend', e => {
            
            e.preventDefault();
            
            if (e.type == 'touchstart' || e.type == 'touchmove' || e.type == 'touchend' || e.type == 'touchcancel') {
                
                let touch = e.touches[0] || e.changedTouches[0];
                touchStopPos = touch.pageY;
            }
            
            if (touchStartPos + touchMinLength < touchStopPos) {
                changeSlide(-1);
            } 
            else if (touchStartPos > touchStopPos + touchMinLength) {
                changeSlide(1);
            }
        });
    };

    
    /* SLIDER FUNCTIONS */

    /* Prevent double scrolling */

    const detectChangeEnd = () => {

        let transition;
        let e = document.createElement('foobar');
        
        let transitions = {
            'transition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'MozTransition': 'transitionend',
            'WebkitTransition': 'webkitTransitionEnd'
        };

        for (transition in transitions) {
            if (e.style[transition] !== undefined) {
                return transitions[transition];
            }
        }

        return true;
    };

    
    /* Handle styling */

    const changeCss = (obj, styles) => {
        for (let _style in styles) {
            if (obj.style[_style] !== undefined) {
                obj.style[_style] = styles[_style];
            }
        }
    };

    
    /* Handle page change */

    const changeSlide =  direction => {

        // change already taking place
        if (isChanging || (direction == 1 && currentSlide == pages.length) || (direction == -1 && currentSlide == 1)) {
            return;
        }

        // change slide
        currentSlide += direction;
        isChanging = true;
        
        changeCss(document.querySelector(sliderElement), {
            transform: 'translate3d(0, ' + -(currentSlide - 1) * 100 + '%, 0)'
        });

        // change dots
        document.querySelector('a.slider-bullet-active').classList.remove('slider-bullet-active');
        document.querySelector(`a[data-slider-target-index="${currentSlide}"]`).classList.add('slider-bullet-active');
    };

    // go to specific slide if it exists
    const changeToSlide = where => {
        
        let target = document.querySelector(where).getAttribute('data-slider-index');
        
        if (target != currentSlide && document.querySelector(where)) {
            changeSlide(target - currentSlide);
        }
    };

    
    /* Move to hashed slide on page load */

    if (location.hash) {
        
        setTimeout( () => {
            window.scrollTo(0, 0);
            changeToSlide(location.hash);
        }, 1);
    };


    /* Initialize script :) */

    if (document.readyState === 'complete') {
        init();
    } else {
        window.addEventListener('onload', init(), false);
    }
};
