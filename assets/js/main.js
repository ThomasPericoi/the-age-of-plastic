// On load
document.addEventListener("DOMContentLoaded", function () {
    // General - Set/Update variables
    function updateVariables() {
        document
            .querySelector(":root")
            .style.setProperty("--viewport-height", window.innerHeight + "px");
        document
            .querySelector(":root")
            .style.setProperty(
                "--header-height",
                document.querySelector("#header").offsetHeight + "px"
            );
    }
    window.addEventListener("resize", function () {
        updateVariables();
    });
    updateVariables();

    // General - Insert quote in the console
    console.log(
        "This theme was made by Thomas Pericoi - https://thomaspericoi.com/"
    );

    // General - Enable ASCII Printer on random
    printRandomAscii();

    // General - Enable OpenDyslexic toggle
    if (document.getElementById("open-dyslexic")) {
        function enableDyslexicMode() {
            document.querySelector(":root").style.setProperty("--bold", "OpenDyslexic, sans-serif");
            document.querySelector(":root").style.setProperty("--body", "OpenDyslexic, sans-serif");
            sessionStorage.setItem("dyslexicMode", true);
            console.log("OpenDyslexic is enabled");
        }
        function disableDyslexicMode() {
            document.querySelector(":root").style.setProperty("--bold", "Open Sans, sans-serif");
            document.querySelector(":root").style.setProperty("--body", "Open Sans, sans-serif");
            sessionStorage.setItem("dyslexicMode", false);
            console.log("OpenDyslexic is disabled");
        }
        if (sessionStorage.getItem("dyslexicMode") == "true") {
            enableDyslexicMode();
            document.getElementById("open-dyslexic").checked = true;
        } else {
            disableDyslexicMode();
            document.getElementById("open-dyslexic").checked = false;
        };
        document.getElementById("open-dyslexic").addEventListener("change", function () {
            if (this.checked) {
                enableDyslexicMode();
            } else {
                disableDyslexicMode();
            }
        });
    }

    // General - Elements is in view
    function toggleClassOnScroll(trigger, target) {
        if (trigger && target) {
            var elementTop = trigger.getBoundingClientRect().top;
            var elementBottom = trigger.getBoundingClientRect().bottom;
            if (
                (elementTop > window.innerHeight * 0.1 &&
                    elementTop < window.innerHeight * 0.6) ||
                (elementBottom > window.innerHeight * 0.4 &&
                    elementBottom < window.innerHeight * 0.9)
            ) {
                target.classList.add("js-inView");
            } else {
                target.classList.remove("js-inView");
            }
        }
    }
    function markAsViewed(trigger, target) {
        if (trigger && target) {
            if (trigger && target) {
                var elementTop = trigger.getBoundingClientRect().top;
                var elementBottom = trigger.getBoundingClientRect().bottom;
                if (
                    (elementTop > window.innerHeight * 0.1 &&
                        elementTop < window.innerHeight * 0.6) ||
                    (elementBottom > window.innerHeight * 0.4 &&
                        elementBottom < window.innerHeight * 0.9)
                ) {
                    target.classList.add("js-viewed");
                }
            }
        }
    }
    window.addEventListener("scroll", () => {
        document
            .querySelectorAll(".js-toBeTriggered")
            .forEach(function (item, index) {
                toggleClassOnScroll(item, item);
            });
        document.querySelectorAll("main section").forEach(function (item, index) {
            markAsViewed(item, item);
        });
    });
    document
        .querySelectorAll(".js-toBeTriggered")
        .forEach(function (item, index) {
            toggleClassOnScroll(item, item);
        });
    document.querySelectorAll("main section").forEach(function (item, index) {
        markAsViewed(item, item);
    });

    // Element - Header - Menu
    document
        .querySelectorAll("header .menu-header>li>a")
        .forEach(function (item) {
            item.tabIndex = 0;
        });

    if (window.innerWidth < 1200) {
        document.querySelector(".nav-wrapper").toggleAttribute("inert");
        document
            .querySelector("main")
            .setAttribute(
                "aria-hidden",
                !(document.querySelector("main").getAttribute("aria-hidden") == "true"
                    ? true
                    : false)
            );
    }

    document.querySelectorAll(".menu-toggle").forEach(function (item) {
        item.addEventListener("click", function () {
            document.querySelector("body").classList.toggle("js-menuOpened");
            if (window.innerWidth < 1200) {
                document.querySelector(".nav-wrapper").toggleAttribute("inert");
                document
                    .querySelector("main")
                    .setAttribute(
                        "aria-hidden",
                        !(document.querySelector("main").getAttribute("aria-hidden") ==
                            "true"
                            ? true
                            : false)
                    );
            }
            document.querySelector("main").toggleAttribute("inert");
            document
                .querySelector("main")
                .setAttribute(
                    "aria-hidden",
                    !(document.querySelector("main").getAttribute("aria-hidden") == "true"
                        ? true
                        : false)
                );
            document.querySelector("footer").toggleAttribute("inert");
            document
                .querySelector("footer")
                .setAttribute(
                    "aria-hidden",
                    !(document.querySelector("footer").getAttribute("aria-hidden") ==
                        "true"
                        ? true
                        : false)
                );
        });
    });

    document.querySelectorAll("#menu-toggle").forEach(function (item) {
        item.addEventListener("keydown", (event) => {
            if (event.code === "Enter" || e.keyCode === 13) {
                item.click();
            }
        });
    });

    if (window.innerWidth < 1200) {
        document.querySelectorAll(".menu-item-has-children").forEach(item => {
            item.querySelector(".sub-menu").setAttribute("aria-hidden", "true");
            item.querySelector(".sub-menu").setAttribute("aria-expanded", "false");

            item.addEventListener("click", (event) => {
                document.querySelector(".menu-item-has-children.active") && document.querySelector(".menu-item-has-children.active").classList.remove("active");
                document.querySelector(".menu-item-has-children.active") && document.querySelector(".menu-item-has-children.active").setAttribute("aria-hidden", "true");
                document.querySelector(".menu-item-has-children.active") && document.querySelector(".menu-item-has-children.active").setAttribute("aria-expanded", "false");

                item.classList.add("active");
                item.querySelector(".sub-menu").setAttribute("aria-hidden", "false");
                item.querySelector(".sub-menu").setAttribute("aria-expanded", "true");
                skipStep = false;
            });
        });
    }

    // Element - Slider - Comparison
    document.querySelectorAll(".comparison-slider").forEach((slider) => {
        const handle = slider.querySelector("input[type='range']");

        handle.addEventListener("input", () => {
            slider.style.setProperty("--mask-width", `${handle.value}%`);
        });
        slider.style.setProperty("--mask-width", `${handle.value}%`);
    });

    // Page - Homepage - PR
    var homePRSwiper = new Swiper(".home-pr .swiper", {
        slidesPerView: 2,
        spaceBetween: 25,
        speed: 10000,
        loop: true,
        freeMode: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        breakpoints: {
            1200: {
                slidesPerView: 5,
                spaceBetween: 50
            },
        }
    });
});