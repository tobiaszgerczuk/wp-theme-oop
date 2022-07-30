//footer scripts
function initAccordionFooter(elem, option){
    //addEventListener on mouse click
    document.addEventListener('click', function (e) {
        //check is the right element clicked
        if (!e.target.matches(elem+' .subheading')) return;
        else{
            //check if element contains active class
            if(!e.target.parentElement.classList.contains('active')){
                //if option true remove active class from all other accordions
                var elementList = document.querySelectorAll(elem +' .menu_foot');
                Array.prototype.forEach.call(elementList, function (e) {
                    e.classList.remove('active');
                });
                //add active class on cliked accordion
                e.target.parentElement.classList.add('active');
            }else{
                //remove active class on cliked accordion
                e.target.parentElement.classList.remove('active');
            }
        }
    });
}

//activate accordion function
initAccordionFooter('.footer_accordion', true);

//disable click on #menu-main-menu
const menuItems = document.querySelectorAll(".site-header__navigation li.menu-item-has-children > a, .mobile_main_menu li.menu-item-has-children > a");
if(menuItems) {
    menuItems.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
        });
    }); 
}

//navigation scripts
const child = document.querySelectorAll(".mobile_main_menu ul li.menu-item-has-children");
if(child){
    child.forEach((link) => {
        link.addEventListener('click', (e) => {
            link.querySelector('ul.sub-menu').classList.toggle("open_sub");
            link.querySelector('a').classList.toggle("triangle_up");
        });
    });
}

const first_links = document.querySelectorAll(".mobile_main_menu ul li.menu-item-has-children");
if(first_links){
    first_links.forEach((first_link) => {
        first_link.querySelector('a').href="#";
    });
}


const nav = document.querySelector("#nav-toggle");
if(nav){
    nav.addEventListener("click", function (event) {
        event.preventDefault();
        this.classList.toggle("active");
        document.querySelector(".site-header").classList.toggle("open");
        document.querySelector("body").classList.toggle("mobile-menu-is-open");
        if(child){
            child.forEach((link) => {
                    link.querySelector('ul.sub-menu').classList.remove("open_sub");
                    link.querySelector('a').classList.remove("triangle_up");
            });
        }
    });
    const oldWidth = document.documentElement.clientWidth
    window.addEventListener('resize', function(event) {
        const newWidth = document.documentElement.clientWidth
        if(oldWidth != newWidth) { 
            nav.classList.remove("active")
            document.querySelector(".site-header").classList.remove("open");
            document.querySelector("body").classList.remove("mobile-menu-is-open");
        }
    }, true);
}

// Blue dot at the end of h1 and h2 heading
let headings = document.querySelectorAll('h1, h2, h3.member--name');
if ( headings ) {
    Array.from( headings ).forEach( heading => {
        let headingText = heading.innerText;
        if ( headingText.charAt( headingText.length - 1 ) === '.' ) {
            heading.innerHTML = headingText.replace( '.', '<span class="has-one-color">.</span>' );
        }
    });
}

let memberPhoto = document.querySelectorAll('.member--photo img');
if(memberPhoto) {
    memberPhoto.forEach((photo) => {
       photo.style.height = photo.width + 'px' 
    });
}

// Modal for contact form and video from content-image block
let modal = document.getElementById('popup__modal');

if (modal) {
    let popup = document.querySelector('.popup');
    let popup_form = document.querySelector('.popup_form');
    let popup_video = document.querySelector('.popup.popup_video');
    let btn   = document.getElementById("popup__btn");
    let btn_popup   = document.getElementById("btn_popup");


    if (btn !== null) {
        btn.onclick = function (e) {
            e.preventDefault();
            popup.style.display = "block";
            document.querySelector('body').style.overflow = "hidden";
        }

        let close = document.querySelector('.popup__content-close');
        if(close != null) {
            close.addEventListener('click', function (event) {
                event.preventDefault();
                const videos = document.querySelectorAll('iframe')
                videos.forEach(i => {
                    const source = i.src
                    i.parentNode.replaceChild(i.cloneNode(), i);

                })
                popup.style.display = "none";
                document.querySelector("body").classList.remove("mobile-menu-is-open");
            });
        }

        let close_popup = document.getElementById('close_popup');

        if(close_popup != null) {
            close_popup.addEventListener('click', function (event) {
                event.preventDefault();
                popup_form.style.display = "none";
                document.querySelector("body").classList.remove("mobile-menu-is-open");
            });
        }

        window.addEventListener('click', function (event) {
            if (event.target == popup_video) {
                // Which means he clicked somewhere in the modal (background area), but not target = modal-content
                event.preventDefault();
                const videos = document.querySelectorAll('iframe')
                videos.forEach(i => {
                    const source = i.src
                    i.parentNode.replaceChild(i.cloneNode(), i);

                })
                popup_video.style.display = "none";
                document.querySelector("body").classList.remove("mobile-menu-is-open");

            }
        });


    }

    if (btn_popup !== null) {
        btn_popup.onclick = function (e) {
            e.preventDefault();
            popup_form.style.display = "block";
            document.querySelector("body").classList.toggle("mobile-menu-is-open");
        }

        let close = document.querySelector('.popup__content-close');

        // This will run when the .open-modal element is clicked
        close.addEventListener('click', function (event) {
            event.preventDefault();
            popup_form.style.display = "none";
            document.querySelector("body").classList.remove("mobile-menu-is-open");
        });

        window.onclick = function (event) {
            if (event.target == popup_form) {
                // Which means he clicked somewhere in the modal (background area), but not target = modal-content
                popup_form.style.display = 'none';
                document.querySelector("body").classList.remove("mobile-menu-is-open");
            }
        };
    }
}

//inputs form
const links = document.querySelectorAll('.gfield');
links.forEach((link) => {
    link.addEventListener('focus', () => {
        link.classList.add('active_input');
    },true
    );
    link.addEventListener('blur', () => {
        link.classList.add('active_input');
    },true
    );
    const inputFeilds = link.querySelectorAll("input");

    const validInputs = Array.from(inputFeilds).filter( input => input.value !== "");
    if(validInputs != ''){
        link.classList.add('active_input');
        link.classList.add('validation_pass');
    }


    const textareaFeilds = link.querySelectorAll("textarea");

    const validTextarea = Array.from(textareaFeilds).filter( textarea => textarea.value !== "");
    if(validTextarea != ''){
        link.classList.add('active_input');
        link.classList.add('validation_pass');
    }

});
const button = document.querySelectorAll('.gform_button');
button.forEach((button) => {
    button.addEventListener('click', () => {
        button.classList.add('clicked_button');

    });

});

document.addEventListener("DOMContentLoaded", function() {
    const HeaderCircle = document.querySelectorAll(
        '.page-header__circle'
    ).length > 0;

    if (HeaderCircle) {
        document.querySelector('.page-header__circle').style.display = 'block';
        document.querySelector('.page-header__circle').classList.add('animation_cirle');
    }

});

document.addEventListener('facetwp-loaded', function() {
    if(document.querySelector('[data-name="jobs_erly"] .facetwp-checkbox[data-value="1"] .facetwp-display-value')) {
        document.querySelector('[data-name="jobs_erly"] .facetwp-checkbox[data-value="1"] .facetwp-display-value').innerHTML = "Toon alleen Erly vacatues"
    }
});
document.addEventListener('facetwp-refresh', function() {
    if(document.querySelector('[data-name="jobs_erly"] .facetwp-checkbox[data-value="1"] .facetwp-display-value')) {
        document.querySelector('[data-name="jobs_erly"] .facetwp-checkbox[data-value="1"] .facetwp-display-value').innerHTML = "Toon alleen Erly vacatues"
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const heroContent = document.querySelector('h1.heading.has-dot') 
    const heroHeadingLastPoint = document.querySelector('.heading > .has-one-color')
    if (heroHeadingLastPoint && heroContent) {
        const changeFontSize = () => {
            const heroHeadingLastPointPosition = heroHeadingLastPoint.getBoundingClientRect().right
            const contentWidth = document.documentElement.clientWidth - 2*24
            if(heroHeadingLastPointPosition > contentWidth) {
                const fontSizeValue = heroContent.computedStyleMap().get('font-size').value
                const fontSizeUnit = heroContent.computedStyleMap().get('font-size').unit
                heroContent.style.fontSize = `${fontSizeValue-1}${fontSizeUnit}` 
                changeFontSize()
            }
        }
        changeFontSize()
    }
})


//number animations

var myElement = document.getElementById('faqs_block');

if (myElement) {

var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};
window.addEventListener('scroll', function (event) {
    if (isInViewport(myElement)) {
        const counters = document.querySelectorAll('.number_facts');
        const speed = 200;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute('akhi');
                const data = +counter.innerText;

                const time = value / speed;
                if (data < value) {
                    counter.innerText = Math.ceil(data + time);
                    setTimeout(animate, 100);
                } else {
                    counter.innerText = value;
                }

            }

            animate();
        });

    }
}, false);

}