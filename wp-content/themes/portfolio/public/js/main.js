document.querySelectorAll('.skills_2D_flex_container article, .skills_web_flex_container article').forEach(articleElt => {
    articleElt.addEventListener('mouseover', (e) => {
        if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:first-child')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:nth-child(2)')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:last-child')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:first-child')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:first-child)').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(2)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(3)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(3))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(4)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(4))').forEach(article => {
                article.classList.add('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(5)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(5))').forEach(article => {
                article.classList.add('opacity');
            });
        }else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:last-child')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:last-child)').forEach(article => {
                article.classList.add('opacity');
            });
        }
    });

    articleElt.addEventListener('mouseleave', (e) => {
        if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:first-child')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:nth-child(2)')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_2D_flex_container article:last-child')) {
            document.querySelectorAll('.skills_2D_flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:first-child')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:first-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(2)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(2))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(3)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(3))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(4)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(4))').forEach(article => {
                article.classList.remove('opacity');
            });
        } else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:nth-child(5)')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:nth-child(5))').forEach(article => {
                article.classList.remove('opacity');
            });
        }else if (e.currentTarget === document.querySelector('.skills_web_flex_container article:last-child')) {
            document.querySelectorAll('.skills_web_flex_container article:not(:last-child)').forEach(article => {
                article.classList.remove('opacity');
            });
        }
    });
});






