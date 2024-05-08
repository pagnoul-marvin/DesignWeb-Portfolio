export const settings = {

    //DOM Elements
    pagesButtonElements: '.pages_button',
    goUpElement: document.getElementById('go_up'),
    validateDiv: document.getElementById('validate'),
    notValidateDiv: document.getElementById('not_validate'),
    sectionElements: document.querySelectorAll('main section:not(:nth-child(4)):not(:nth-child(5))'),
    progressBarElement: document.getElementById('progress_bar'),
    noJsMessageElement: document.getElementById('no_js_message'),


    //Strings
    legalNoticesInURL: 'mentions-legales',
    jiriInURL: 'jiri-2',
    curriculumVitaeInURL: 'mon-curriculum-vitae',
    twoDimensionsInURL: 'mon-compte-instagram-sur-la-2d',
    kPerformInURL: 'logo-kperform',


    //Classes
    pulseAnimationClasses: {
        giveAnimationClass: 'animate__animated',
        typeOfAnimationClass: 'animate__pulse',
        infiniteAnimationClass: 'animate__infinite',
    },
    delayedVisibilityClass: 'delayed_visibility',
    disappearClass: 'disappear',
    appearClass: 'appear',
    noDisplayClass: 'no_display',


    //Numbers
    timeBeforeGoUpElementDisappear: 300,
    timeBeforeDivElementsDisappear: 7000,
    multiplicationScrolled: 100,
}