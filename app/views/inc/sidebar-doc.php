<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="sidebar-grid">
            <div class="sidebar-container1">
                <img src="<?php echo IMG;?>logo - white.svg" alt="logo white" width="213" height="35.18">
            </div>
            <div class="sidebar-container2">
                <a href="">
                    <img src="<?php echo IMG;?>ug-avatar-1.svg" alt="ug avatar" width="80" height="80">
                </a>
                <p class="p-regular" style="color: var(--zerene-light);">Username</p>
                <button class="button-second">Edit</button>
            </div>
            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>undergrad/home" class="top" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>undergrad/questionnaires" class="top" id="sb-link2">Questionnaires</a>
                <a class="top dd-btn">Counsellors</a>
                    <div class="dropdown-container">
                        <a href="Professional Counsellors" class="dd-content" id="sb-link3">Professional</a>
                        <a href="<?php echo URLROOT; ?>undergrad/ac" class="dd-content" id="sb-link4">Academic</a>
                    </div>
                <a href="Psychiatrists" class="top" id="sb-link5">Psychiatrists</a>
                <a href="Chats" class="top" id="sb-link6">Chats</a>
                <a href="Resources" class="top" id="sb-link7">Resources</a>
            </div>
            <div class="sidebar-container3">
                <a href="" class="bottom">Help & Info</a>
                <a href="" class="bottom">Feedback</a>
                <a href="" class="bottom">Log out</a>
            </div>
        </div>

        <script src="<?php echo JS;?>sidebar.js"></script>
    </body>
</html>