document.addEventListener("DOMContentLoaded", function () {
    const productCards = document.querySelectorAll(".product-card");
    const heroTexts = document.querySelectorAll(".fade-in-slide-up");

    // Tambahkan animasi fade-in-slide-up langsung di JS
    heroTexts.forEach((text) => {
        text.style.opacity = "0";
        text.style.transform = "translateY(20px)";
        text.style.transition =
            "opacity 0.5s ease-out, transform 0.5s ease-out";
    });

    // Tampilkan teks hero dengan animasi
    setTimeout(() => {
        heroTexts.forEach((text, index) => {
            setTimeout(() => {
                text.style.opacity = "1";
                text.style.transform = "translateY(0)";
            }, index * 300); // Delay untuk animasi berurutan
        });
    }, 500);

    // Hover effect untuk card
    productCards.forEach((card) => {
        card.style.transition =
            "transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out";

        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.05)";
            card.style.boxShadow = "0 8px 16px rgba(0, 0, 0, 0.2)";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
            card.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.1)";
        });
    });

    // Observer untuk animasi scroll pada produk
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }
            });
        },
        { threshold: 0.2 }
    );

    productCards.forEach((card) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(10px)";
        card.style.transition =
            "opacity 0.5s ease-out, transform 0.5s ease-out";
        observer.observe(card);
    });
});
