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
                <a class="button-main sidebar-button" href="<?php echo URLROOT; ?>procounsellor/pc_profileupdate" id="sb-link8">Edit</a>
                <!-- <a type="button" href="<?php echo URLROOT; ?>procounsellor/pc_profileupdate" id="sb-link8"></a> -->
            </div>

            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>procounsellor/pc_home" class="top" id="sb-link1">Home</a>
                <a class="top dd-btn">Questionnaires</a>
                    <div class="dropdown-container">
                        <a href="<?php echo URLROOT;?>procounsellor/pc_reviewq" class="dd-content" id="sb-link2">Review</a>
                        <a href="" class="dd-content" id="sb-link3">Create</a>
                    </div>
                <a href="<?php echo URLROOT;?>procounsellor/pc_undergrad" class="top" id="sb-link4">Undergraduates</a>
                <a href="<?php echo URLROOT;?>procounsellor/pc_chats" class="top" id="sb-link5">Chats</a>
                <a class="top dd-btn">Professionals</a>
                    <div class="dropdown-container">
                        <a href="" class="dd-content" id="sb-link6">Counselors</a>
                        <a href="" class="dd-content" id="sb-link7">Psychiatrists</a>
                    </div>
                <a href="" class="top" id="sb-link8">Timeslots</a>
            </div>

            <div class="sidebar-container3">
                <a href="" class="bottom">Help & Info</a>
                <a href="" class="bottom">Feedback</a>
                <a href="<?php echo URLROOT;?>users/logout" class="bottom">Log out</a>
            </div>
        </div>

        <script src="<?php echo JS;?>sidebar.js"></script>
    </body>
</html>