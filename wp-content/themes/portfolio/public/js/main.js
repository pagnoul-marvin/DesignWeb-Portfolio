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



