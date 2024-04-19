<!-- <!DOCTYPE html>
<html lang="en"> -->
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
                    <img src="<?php echo IMG;?>doc-avatar2.svg" alt="ug avatar" width="80" height="80">
                </a>
                <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name'];?></p>
                <a href="<?php echo URLROOT;?>doctor/doc_profile" id="sb-link9" style="text-decoration: none;"><button class="button-second">View Profile</button></a>
            </div>
            <div class="sidebar-container3">
                <a href="<?php echo URLROOT; ?>doctor/doc_home" class="top <?php echo ($currentPage === 'doc_home') ? 'active' : ''; ?>" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_questionnaires" class="top <?php echo ($currentPage === 'doc_questionnaires') ? 'active' : ''; ?>" id="sb-link2">Questionnaires</a>
                <a  href="#" class="top dd-btn">Professionals</a>
                    <div class="dropdown-container">
                        <a href="<?php echo URLROOT; ?>doctor/doc_counselors" class="dd-content <?php echo ($currentPage === 'doc_counselors') ? 'active' : ''; ?>" id="sb-link3">Counsellors</a>
                        <a href="<?php echo URLROOT; ?>doctor/doc_doctors" class="dd-content <?php echo ($currentPage === 'doc_doctor') ? 'active' : ''; ?>" id="sb-link4">Psychiatrists</a>
                    </div>
                <a href="<?php echo URLROOT; ?>doctor/doc_undergrad" class="top <?php echo ($currentPage === 'doc_undergrad') ? 'active' : ''; ?>" id="sb-link5">Undergraduates</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_chats" class="top <?php echo ($currentPage === 'doc_chats') ? 'active' : ''; ?>" id="sb-link6">Chats</a>
                <a href="<?php echo URLROOT; ?>doctor/prescription" class="top <?php echo ($currentPage === 'prescription') ? 'active' : ''; ?>" id="sb-link7">Prescriptions</a>
                <a href="<?php echo URLROOT; ?>doctor/doc_timeslots" class="top <?php echo ($currentPage === 'doc_timeslots') ? 'active' : ''; ?>" id="sb-link8">Timeslots</a>
            </div>
            <div class="sidebar-container3">
                <a href="" class="bottom">Help & Info</a>
                <a href="<?php echo URLROOT;?>doctor/doc_feedback" class="bottom <?php echo($currentPage === 'doc_feedback')? 'active' : ''; ?>" id="sb-link9">Feedback</a>
                <a href="<?php echo URLROOT;?>users/logout" class="bottom">Log out</a>
            </div>
        </div>

        <script src="<?php echo JS;?>sidebar.js"></script>
    </body>
<!-- </html> -->