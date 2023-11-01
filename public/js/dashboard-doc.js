document.addEventListener("DOMContentLoaded", function () {
    const contentDiv = document.querySelector(".content");
    const urlroot = "http://localhost/Zerene/doctor";
    
    // Function to load views into the content area
    function loadView(viewName) {
        //window.location.href=`${urlroot}/${viewName}`;
        fetch(`${urlroot}/${viewName}`) // Replace with your view file names
            .then(response => response.text())
                .then(data => {
                    // console.log(data); - Use the data as needed
                    contentDiv.innerHTML = data;
                })
                .catch((e) => {
                    console.log(e);
                });
            // console.log(response.text())})
            // .then(data => {
            //     contentDiv.innerHTML = data;
            // })
            // .catch((e)=>{console.log(e)}); - commented for view error fixing. 18.10.2023
    }

    // Attach click event listeners to sidebar links
    const sblink1 = document.getElementById("sb-link1");
    const sblink2 = document.getElementById("sb-link2");
    const sblink3 = document.getElementById("sb-link3");
    const sblink4 = document.getElementById("sb-link4");
    const sblink5 = document.getElementById("sb-link5");
    const sblink6 = document.getElementById("sb-link6");
    const sblink7 = document.getElementById("sb-link7");
    
    sblink1.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("home"); // Load home.php
    });

    sblink2.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("questionnaires"); // Load questionnaires.php
    });

    sblink3.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("doc_counselors"); // Load Pcounsellor.php
    });

    sblink4.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("d_doctor"); // Load d_doctor.php
    });

    sblink5.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("doc_undergrad"); // Load doctor.php
    });

    sblink6.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("doc_chats"); // Load chats.php
    });

    sblink7.addEventListener("click", function (e) {
        e.preventDefault();
        loadView("resources"); // Load resources.php
    });

    // Call the default view or homepage view
    //loadView("home"); // Load homepage.html by default
});