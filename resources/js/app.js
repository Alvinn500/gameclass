import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";

AOS.init({
    duration: 800,
    once: true,
});

const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll("#nav-link");

window.addEventListener("scroll", () => {
    let currentSection = "";
    console.log(currentSection);
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        console.log(sectionTop, sectionHeight);
        console.log(section.getAttribute("id"));
        if (pageYOffset >= sectionTop - sectionHeight / 3) {
            currentSection = section.getAttribute("id");
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("nav-active");
        if (link.getAttribute("href") == `/#${currentSection}`) {
            link.classList.add("nav-active");
        }
    });
});

let burger = document.getElementById("hamburger");
let navMobile = document.getElementById("nav-mobile");

burger.addEventListener("click", () => {
    burger.classList.toggle("humburger-active");
    navMobile.classList.toggle("nav-mobile-active");
});
