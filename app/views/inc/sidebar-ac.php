<!-- <!DOCTYPE html>
<html lang="en"> -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">

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
                <button class="button-second"><a href="<?php echo URLROOT;?>academic/ac_profile" class="a-name">Edit</a></button>
            </div>

            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>academic/ac_home" class="top <?php echo ($currentPage === 'ac_home') ? 'active' : ''; ?>" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>academic/ac_opletters" class="top <?php echo ($currentPage === 'ac_opletters') ? 'active' : ''; ?>" id="sb-link2">Opinion Letters</a>
                <a href="<?php echo URLROOT; ?>academic/ac_undergrads" class="top <?php echo ($currentPage === 'ac_undergrads') ? 'active' : ''; ?>" id="sb-link3">Undergraduates</a>
                <a href="#" class="top dd-btn">Professionals</a>
                <div class="dropdown-container">
                    <a href="<?php echo URLROOT;?>academic/ac_counselors" class="dd-content <?php echo ($currentPage === 'ac_counselors') ? 'active' : ''; ?>" id="sb-link4">Counsellors</a>
                    <a href="<?php echo URLROOT; ?>academic/ac_doctors" class="dd-content <?php echo ($currentPage === 'ac_doctors') ? 'active' : ''; ?>" id="sb-link5">Psychiatrists</a>
                </div>
                <a href="<?php echo URLROOT; ?>academic/ac_chats" class="top <?php echo ($currentPage === 'ac_chats') ? 'active' : ''; ?>" id="sb-link6">Chats</a>
                <a href="<?php echo URLROOT; ?>academic/ac_timeslots" class="top <?php echo ($currentPage === 'ac_timeslots') ? 'active' : ''; ?>" id="sb-link7">Timeslots</a>

                </div>
            <div class="sidebar-container3">
                <a href="" class="bottom">Help & Info</a>
                <a href="<?php echo URLROOT;?>academic/ac_feedback" class="bottom <?php echo($currentPage === 'ac_feedback')? 'active' : ''; ?>" id="sb-link8">Feedback</a>
                <a href="<?php echo URLROOT;?>users/logout" class="bottom">Log out</a>
            </div>
        </div>

        <script src="<?php echo JS;?>sidebar.js"></script>
    </body>
<!-- </html> -->