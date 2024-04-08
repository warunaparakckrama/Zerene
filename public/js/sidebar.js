document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".sidebar-container3 .top");
    const dropdownButtons = document.querySelectorAll(".sidebar-container3 .dd-btn");

    links.forEach(function (link) {
        link.addEventListener("click", function () {
            links.forEach(function (otherLink) {
                otherLink.classList.remove("active");
            });

            link.classList.add("active");
        });
    });

    dropdownButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            this.classList.toggle("active");
            const dropdownContent = this.nextElementSibling;
            if (dropdownContent) {
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            }
        });
    });
});
