document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
    const hamburgerIcon = document.getElementById("hamburger-icon");

    let lastScrollTop = 0;
    let scrollTimeout;

    // Navbar hide/show saat scroll
    window.addEventListener("scroll", () => {
        const currentScroll =
            window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            navbar.classList.add("-translate-y-full");
            navbar.classList.remove("translate-y-0");
        } else {
            navbar.classList.remove("-translate-y-full");
            navbar.classList.add("translate-y-0");
        }

        lastScrollTop = currentScroll;

        // Munculkan navbar kembali setelah berhenti scroll
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            navbar.classList.remove("-translate-y-full");
            navbar.classList.add("translate-y-0");
        }, 200);
    });

    // Toggle mobile menu dan animasi hamburger
    mobileMenuToggle.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        hamburgerIcon.classList.toggle("open");
    });
});
