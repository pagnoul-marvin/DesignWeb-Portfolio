document.querySelectorAll('.pages_button').forEach(buttonElt => {
    buttonElt.addEventListener('mouseenter', (e) => {
        e.currentTarget.classList.add('animate__animated', 'animate__pulse', 'animate__infinite');
    });
    buttonElt.addEventListener('mouseout', (e) => {
        e.currentTarget.classList.remove('animate__animated', 'animate__pulse', 'animate__infinite');
    });
});


let timeToReAppear;
window.addEventListener('scroll', () => {
    document.getElementById('go_up').classList.add('delayed_visibility');

    clearTimeout(timeToReAppear);

    timeToReAppear = setTimeout(function () {
        document.getElementById('go_up').classList.remove('delayed_visibility');
    }, 300);
});

setTimeout(function () {
    const validateDiv = document.getElementById('validate');
    const notValidateDiv = document.getElementById('not_validate');
    if (validateDiv) {
        validateDiv.classList.add('disappear');
    }
    if (notValidateDiv) {
        notValidateDiv.classList.add('disappear');
    }
}, 7000);

let sections = document.querySelectorAll('main section:not(:nth-child(3)):not(:nth-child(4))');
window.addEventListener('scroll', () => {
    const scrollPositionY = window.scrollY;
    const windowHeight = window.innerHeight;

    if (window.location.href.includes("mentions-legales")) {
        sections = document.querySelectorAll('main section:not(:nth-child(2))');
    }

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;

        const sectionBottom = sectionTop + sectionHeight;

        if (scrollPositionY > sectionTop - windowHeight + 200 && scrollPositionY < sectionBottom) {
            section.classList.add('appear');
        }
    });

    const winScroll = document.documentElement.scrollTop || document.body.scrollTop; //pour que cela fonctionne sur tous les navigateurs même Internet Explorer.
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;

    document.getElementById('progress_bar').style.width = `${scrolled}%`;
});