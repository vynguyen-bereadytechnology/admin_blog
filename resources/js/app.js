import "./bootstrap";
import "../css/app.css";

// Theme Toggle Script
const themeToggleBtn = document.getElementById("theme-toggle");
const sunIcon = document.getElementById("sun-icon");
const moonIcon = document.getElementById("moon-icon");
const htmlElement = document.documentElement;

// Kiểm tra theme lưu trong localStorage
if (
    localStorage.getItem("theme") === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    htmlElement.classList.add("dark");
    sunIcon?.classList.remove("hidden");
    moonIcon?.classList.add("hidden");
} else {
    htmlElement.classList.remove("dark");
    sunIcon?.classList.add("hidden");
    moonIcon?.classList.remove("hidden");
}

themeToggleBtn?.addEventListener("click", () => {
    htmlElement.classList.toggle("dark");
    if (htmlElement.classList.contains("dark")) {
        localStorage.setItem("theme", "dark");
        sunIcon?.classList.remove("hidden");
        moonIcon?.classList.add("hidden");
    } else {
        localStorage.setItem("theme", "light");
        sunIcon?.classList.add("hidden");
        moonIcon?.classList.remove("hidden");
    }
});

// Mobile menu toggle
const mobileBtn = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");
const closeIcon = document.getElementById("close-icon");

mobileBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
    menuIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
});
