document.querySelectorAll('.flex_container article').forEach(articleElt => {
    articleElt.addEventListener('mouseover', (e) => {
        if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:first-child')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:nth-child(2)')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:last-child')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:first-child')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(2)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(3)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(3))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(4)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(4))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(5)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(5))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:last-child')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#project .flex_container article:first-child')) {
            document.querySelectorAll('#project .flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#project .flex_container article:last-child')) {
            document.querySelectorAll('#project .flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#experience .flex_container article:first-child')) {
            document.querySelectorAll('#experience .flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#experience .flex_container article:last-child')) {
            document.querySelectorAll('#experience .flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        }

    });

    articleElt.addEventListener('mouseleave', (e) => {
        if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:first-child')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:nth-child(2)')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_2D .flex_container article:last-child')) {
            document.querySelectorAll('#skills_2D .flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:first-child')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(2)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(3)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(3))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(4)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(4))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:nth-child(5)')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:nth-child(5))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#skills_web .flex_container article:last-child')) {
            document.querySelectorAll('#skills_web .flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#project .flex_container article:first-child')) {
            document.querySelectorAll('#project .flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#project .flex_container article:last-child')) {
            document.querySelectorAll('#project .flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#experience .flex_container article:first-child')) {
            document.querySelectorAll('#experience .flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('#experience .flex_container article:last-child')) {
            document.querySelectorAll('#experience .flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        }
    });
});


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



