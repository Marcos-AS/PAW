var currentPathname = window.location.pathname;

document.querySelectorAll('nav a').forEach(function(link) {
    if (link.getAttribute('href') === currentPathname) {
    link.classList.add('active');
    } else {
    link.classList.remove('active');
    }
});