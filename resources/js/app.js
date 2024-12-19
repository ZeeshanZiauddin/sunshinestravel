import Alpine from "alpinejs";
import WOW from "wow.js"; // Import WOW.js
import Swiper from "swiper";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// Import custom styles
import "../css/app.css";
import "../css/animate.css";
import "../css/tailwind.css";

window.Alpine = Alpine;
Alpine.start();

// Initialize WOW.js
document.addEventListener("DOMContentLoaded", () => {
    new WOW().init();
});

// Testimonial Swiper setup
document.addEventListener("DOMContentLoaded", () => {
    const testimonialSwiper = new Swiper(".testimonial-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
});

// ==== for menu scroll
document.addEventListener("DOMContentLoaded", () => {
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            const target = document.querySelector(elem.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            }
        });
    });

    // Use `document` instead of `documents`
    document.addEventListener("scroll", onScroll);

    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            const refElement = document.querySelector(val);

            // Check if refElement exists before accessing its properties
            if (refElement) {
                const scrollTopMinus = scrollPos + 73;
                if (
                    refElement.offsetTop <= scrollTopMinus &&
                    refElement.offsetTop + refElement.offsetHeight >
                        scrollTopMinus
                ) {
                    const activeLink = document.querySelector(
                        ".ud-menu-scroll.active"
                    );
                    if (activeLink) {
                        activeLink.classList.remove("active");
                    }
                    currLink.classList.add("active");
                } else {
                    currLink.classList.remove("active");
                }
            }
        }
    }
});
