import {settings} from "./settings";

const portfolio = {

    init() {
        this.jsEnabled();
        this.animationForPagesButtonElements();
        this.disappearGoUpElement();
        this.appearAndDisappearDivElements();
        this.scrollAnimations();
    },

    jsEnabled() {
        settings.noJsMessageElement.classList.add(settings.noDisplayClass);
    },

    animationForPagesButtonElements() {
        document.querySelectorAll(settings.pagesButtonElements).forEach(buttonElt => {
            buttonElt.addEventListener('mouseenter', (e) => {
                e.currentTarget.classList.add(settings.pulseAnimationClasses.giveAnimationClass,
                    settings.pulseAnimationClasses.typeOfAnimationClass,
                    settings.pulseAnimationClasses.infiniteAnimationClass);
            });
            buttonElt.addEventListener('mouseout', (e) => {
                e.currentTarget.classList.remove(settings.pulseAnimationClasses.giveAnimationClass,
                    settings.pulseAnimationClasses.typeOfAnimationClass,
                    settings.pulseAnimationClasses.infiniteAnimationClass);
            });
        });
    },

    disappearGoUpElement() {
        let timeToReAppear;
        window.addEventListener('scroll', () => {
            settings.goUpElement.classList.add(settings.delayedVisibilityClass);

            clearTimeout(timeToReAppear);

            timeToReAppear = setTimeout(() => {
                settings.goUpElement.classList.remove(settings.delayedVisibilityClass);
            }, settings.timeBeforeGoUpElementDisappear);
        });
    },

    appearAndDisappearDivElements() {
        setTimeout(function () {

            if (settings.validateDiv) {
                settings.validateDiv.classList.add('disappear');
            }
            if (settings.notValidateDiv) {
                settings.notValidateDiv.classList.add('disappear');
            }
        }, settings.timeBeforeDivElementsDisappear);
    },

    scrollAnimations() {
        window.addEventListener('scroll', () => {
            this.appearSectionElementsOnScroll();
            this.changeWidthOfProgressBarElementOnScroll();
        });
    },

    appearSectionElementsOnScroll() {

        if (window.location.href.includes("mentions-legales")) {
            settings.sectionElements = document.querySelectorAll('main section:not(:nth-child(3))');
        }

        settings.sectionElements.forEach(section => {
            const scrollPositionY = window.scrollY;
            const windowHeight = window.innerHeight;
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionBottom = sectionTop + sectionHeight;


            if (scrollPositionY > sectionTop - windowHeight + settings.additionForWindowHeight && scrollPositionY < sectionBottom) {
                section.classList.add(settings.appearClass);
            }
        });
    },

    changeWidthOfProgressBarElementOnScroll() {
        const winScroll = document.documentElement.scrollTop || document.body.scrollTop; //pour que cela fonctionne sur tous les navigateurs même sur Internet Explorer.
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * settings.multiplicationScrolled;
        settings.progressBarElement.style.width = `${scrolled}%`;
    }
}

portfolio.init();