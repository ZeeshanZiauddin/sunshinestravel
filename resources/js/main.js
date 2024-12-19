(function () {
    "use strict";

    // Only run this if on the home page

    const ud_header = document.querySelector(".ud-header");
    const logo = document.querySelector(".header-logo");
    const backToTop = document.querySelector(".back-to-top");
    const sticky = ud_header.offsetTop;

    // Cache DOM elements
    const navbarToggler = document.querySelector("#navbarToggler");
    const navbarCollapse = document.querySelector("#navbarCollapse");

    if (window.location.pathname !== "/") {
        ud_header.classList.add("sticky");
        logo.src = "/images/logo/logo.svg"; // Change logo only if needed

        return;
    }

    // Scroll event
    let isScrolling = false;
    window.onscroll = function () {
        if (!isScrolling) {
            window.requestAnimationFrame(function () {
                handleScroll();
                isScrolling = false;
            });
            isScrolling = true;
        }
    };

    function handleScroll() {
        const scrollPos =
            window.pageYOffset || document.documentElement.scrollTop;

        // Sticky header and logo update
        if (scrollPos > sticky) {
            if (!ud_header.classList.contains("sticky")) {
                ud_header.classList.add("sticky");
                logo.src = "/images/logo/logo.svg"; // Change logo only if needed
            }
        } else {
            if (ud_header.classList.contains("sticky")) {
                ud_header.classList.remove("sticky");
                logo.src = "/images/logo/logo-white.svg"; // Change logo only if needed
            }
        }

        // Back-to-top visibility
        if (scrollPos > 50) {
            backToTop.style.display = "flex";
        } else {
            backToTop.style.display = "none";
        }
    }

    // Navbar toggle
    navbarToggler.addEventListener("click", () => {
        navbarToggler.classList.toggle("navbarTogglerActive");
        navbarCollapse.classList.toggle("hidden");
    });

    // Back to top smooth scroll
    document.querySelector(".back-to-top").onclick = () => {
        smoothScroll(document.documentElement);
    };

    function smoothScroll(element, to = 0, duration = 500) {
        const start = element.scrollTop;
        const change = to - start;
        const increment = 20;
        let currentTime = 0;

        const animateScroll = () => {
            currentTime += increment;
            const val = Math.easeInOutQuad(
                currentTime,
                start,
                change,
                duration
            );
            element.scrollTop = val;

            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };

        animateScroll();
    }

    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    };
})();
