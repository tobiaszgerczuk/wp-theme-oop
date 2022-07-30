let submenu  = document.querySelector('.block.submenu');
let mainMenu = document.querySelector('.site-header');
if ( submenu ) {

    // Mobile menu
    let submenuTrigger = submenu.querySelector('.menu__trigger');
    if ( submenuTrigger ) {
        submenuTrigger.onclick = ( event ) => {
            event.currentTarget.parentElement.classList.toggle('is-open');
        }
    }

    let menuItems = submenu.getElementsByClassName('menu__item');
    let headerOffset = submenu.offsetHeight + 10;
    if ( menuItems ) {

        // Scroll to section
        Array.from( menuItems ).forEach( item => {
            item.onclick = ( event ) => {
                event.preventDefault();
                let anchor = event.target.getAttribute( 'href' );
                let target = document.getElementById( anchor.substring( 1 ) );
                if ( target ) {
                    let elementPosition = document.getElementById( anchor.substring( 1 ) ).getBoundingClientRect().top;
                    let offsetPosition = elementPosition + window.pageYOffset - 265;
                    if ( window.innerWidth > 992 ) {
                        offsetPosition = elementPosition + window.pageYOffset - 90;
                    }
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                    history.replaceState( null, null, document.location.pathname + anchor );
                    item.parentElement.classList.remove( 'is-open' );
                    item.classList.add( 'is-active' );
                }
            }
        } );

        // Get sections from menu anchors
        let sections = Array.from( menuItems ).map( item => item.getAttribute( 'href' ).substring( 1 ) );
        sections = sections.filter(element => {
            return element !== '';
        });
        let lastScrollTop = 0;
        onscroll = () => {
            if ( sections ) {

                // Highlight current section
                let scrollY = window.pageYOffset;
                sections.forEach(section => {
                    let currentSection = document.getElementById(section);
                    let sectionHeight = currentSection.offsetHeight;
                    let sectionTop = (currentSection.getBoundingClientRect().top + window.pageYOffset) - headerOffset;
                    if ( scrollY > sectionTop && scrollY <= sectionTop + sectionHeight ) {
                        submenu.querySelector('nav.menu a[href*=' + section + ']').classList.add('is-active');
                    } else {
                        submenu.querySelector('nav.menu a[href*=' + section + ']').classList.remove('is-active');
                    }
                } );

            }

            // Show/hide main menu
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if ( scrollTop > lastScrollTop ){
                submenu.style.top = '0px';
                if ( submenu.getBoundingClientRect().top <= mainMenu.offsetHeight ) {
                    mainMenu.style.top = '-' + ( mainMenu.offsetHeight - submenu.getBoundingClientRect().top ) + 'px';
                }
            } else {
                mainMenu.style.top = '0px';
                if ( submenu.getBoundingClientRect().top < mainMenu.offsetHeight ) {
                    submenu.style.top = mainMenu.offsetHeight + 'px';
                }
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }
    }

    let bottomButton = submenu.querySelector('div.buttons');
    if ( bottomButton ) {
        addPaddingToFooter( bottomButton.offsetHeight );
        window.onresize = () => {
            addPaddingToFooter( bottomButton )
        };
    }
}

// Footer bottom padding
function addPaddingToFooter( pixels ) {
    let footer      = document.querySelector('footer.footer');
    let windowWidth = window.innerWidth;
    if ( footer && ( windowWidth <= 992 ) ) {
        let paddingBottom = window.getComputedStyle(footer, null).getPropertyValue('padding-bottom');
        if ( paddingBottom ) {
            footer.style.paddingBottom = ( parseInt( paddingBottom.substring( 0, paddingBottom.length - 2 ) ) + pixels ) + 'px';
        } else {
            footer.style.paddingBottom = pixels + 'px';
        }
    }
}
