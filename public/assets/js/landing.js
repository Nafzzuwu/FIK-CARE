// Smooth scroll behavior
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute("href"))
            .scrollIntoView({ behavior: "smooth" });
    });
});

// Auto highlight navbar based on scroll
window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("section");
    let scrollPos = window.scrollY + 200;

    sections.forEach(sec => {
        if (scrollPos >= sec.offsetTop && scrollPos < sec.offsetTop + sec.offsetHeight) {
            document.querySelectorAll(".nav-links a").forEach(a => a.classList.remove("active"));
            let id = sec.getAttribute("id");
            document.querySelector(`.nav-links a[href="#${id}"]`)?.classList.add("active");
        }
    });
});
