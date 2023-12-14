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
                <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name'];?>Username</p>
                <a href="<?php echo URLROOT;?>doctor/doc_profile" id="sb-link9" style="text-decoration: none;"><button class="button-second">Edit</button></a>
            </div>
            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>doctor/doc_home" class="top" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_questionnaires" class="top" id="sb-link2">Questionnaires</a>
                <a class="top dd-btn">Professionals</a>
                    <div class="dropdown-container">
                        <a href="<?php echo URLROOT; ?>doctor/doc_counselors" class="dd-content" id="sb-link3">Counsellors</a>
                        <a href="<?php echo URLROOT; ?>doctor/doc_doctors" class="dd-content" id="sb-link4">Psychiatrists</a>
                    </div>
                <a href="<?php echo URLROOT; ?>doctor/doc_undergrad" class="top" id="sb-link5">Undergraduates</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_chats" class="top" id="sb-link6">Chats</a>
                <a href="<?php echo URLROOT; ?>doctor/prescription" class="top" id="sb-link7">Prescriptions</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_timeslots" class="top" id="sb-link8">Timeslots</a>
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