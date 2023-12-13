document.addEventListener("DOMContentLoaded", function ()
            {
                const links = document.querySelectorAll("a.top");
                const dropdownButtons = document.querySelectorAll(".dd-btn");
                const dropdownContents = document.querySelectorAll(".dropdown-container .dd-content");

                // links.forEach(function (link) {
                //     link.addEventListener("click", function (e) {
                //         // Prevent the default link behavior (e.g., navigating to a new page)

                //         // Remove the "active" class from all links
                //         links.forEach(function (otherLink) {
                //             otherLink.classList.remove("active");
                //         });

                //         // Add the "active" class to the clicked link
                //         link.classList.add("active");

                //         // Close all dropdowns when a link is clicked
                //         dropdownButtons.forEach(function (button) {
                //             button.classList.remove("active");
                //             var dropdownContent = button.nextElementSibling;
                //             dropdownContent.style.display = "none";
                //         });
                //     });
                // });

                dropdownButtons.forEach(function (button) {
                    button.addEventListener("click", function () {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                });

            });