document.getElementById('contact-link').addEventListener('click', function(event) {
    event.preventDefault();
    window.location.href = 'contact.html';
});

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})
document.querySelectorAll(".navLink").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}))

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.slider-btns button');

    buttons.forEach(button => {
        button.addEventListener('mousedown', function() {
            // Add 'clicked' class to the clicked button
            this.classList.add('clicked');
        });

        button.addEventListener('mouseup', function() {
            // Remove 'clicked' class from all buttons
            buttons.forEach(btn => btn.classList.remove('clicked'));
        });

        // Handle mouse leave to ensure state cleanup if mouse moves out
        button.addEventListener('mouseleave', function() {
            // Remove 'clicked' class from all buttons
            buttons.forEach(btn => btn.classList.remove('clicked'));
        });
    });
});
