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
                <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name'];?></p>
                <a href="<?php echo URLROOT; ?>undergrad/ug_profile" id="sb-link8" style="text-decoration: none;"><button class="button-second">View</button></a>
            </div>
            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>undergrad/home" class="top <?php echo ($currentPage === 'home') ? 'active' : ''; ?>" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>undergrad/questionnaires" class="top <?php echo ($currentPage === 'questionnaires') ? 'active' : ''; ?>" id="sb-link2">Questionnaires</a>
                <a href="<?php echo URLROOT; ?>undergrad/professionals" class="top <?php echo ($currentPage === 'professionals') ? 'active' : ''; ?>" id="sb-link4">Professionals</a>
                <a href="<?php echo URLROOT; ?>undergrad/home" class="top <?php echo ($currentPage === 'request_letters') ? 'active' : ''; ?>" id="sb-link5">Request Letters</a>
                <a href="<?php echo URLROOT; ?>undergrad/view_timeslotpc" class="top <?php echo ($currentPage === 'view_timeslotpc') ? 'active' : ''; ?>" id="sb-link3">Timeslots</a>
                <a href="<?php echo URLROOT; ?>undergrad/chats" class="top <?php echo ($currentPage === 'chats') ? 'active' : ''; ?>" id="sb-link6">Chats</a>
                <a href="<?php echo URLROOT; ?>undergrad/resources" class="top <?php echo ($currentPage === 'resources') ? 'active' : ''; ?>" id="sb-link7">Resources</a>
            </div>
            <div class="sidebar-container3">
                <a href="" class="bottom">Help & Info</a>
                <a href="<?php echo URLROOT; ?>undergrad/feedback" class="bottom <?php echo ($currentPage === 'feedback') ? 'active' : ''; ?>">Feedback</a>
                <a href="<?php echo URLROOT;?>users/logout" class="bottom">Log out</a>
            </div>
        </div>

        <script src="<?php echo JS;?>sidebar.js"></script>
    </body>
</html>