<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar-grid">
        <div class="sidebar-container1">
            <img src="<?php echo IMG; ?>logo - white.svg" alt="logo white" width="213" height="35.18">
        </div>
        <div class="sidebar-container2">
            <a href="">
                <img src="<?php echo IMG; ?>ug-avatar-1.svg" alt="ug avatar" width="80" height="80">
            </a>
            <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name']; ?></p>
            <a href="<?php echo URLROOT; ?>procounsellor/pc_profileupdate" id="sb-link10" style="text-decoration: none;"><button class="button-second">Edit</button></a>
        </div>

        <div class="sidebar-container3">
            <a href="<?php echo URLROOT; ?>procounsellor/pc_home" class="top <?php echo ($currentPage === 'pc_home') ? 'active' : ''; ?> " id="sb-link1">Home</a>
            <a class="top dd-btn">Questionnaires</a>
            <div class="dropdown-container">
                <a href="<?php echo URLROOT; ?>procounsellor/pc_reviewq" class="dd-content <?php echo ($currentPage === 'pc_reviewq') ? 'active' : ''; ?> " id="sb-link2">Review</a>
                <a href="" class="dd-content" id="sb-link3">Create</a>
            </div>
            <a href="<?php echo URLROOT; ?>procounsellor/pc_undergrad" class="top <?php echo ($currentPage === 'pc_undergrad') ? 'active' : ''; ?> " id="sb-link4">Undergraduates</a>
            <a href="<?php echo URLROOT; ?>procounsellor/pc_chats" class="top <?php echo ($currentPage === 'pc_chats') ? 'active' : ''; ?>" id="sb-link5">Chats</a>
            <a class="top dd-btn">Professionals</a>
            <div class="dropdown-container">
                <a href="<?php echo URLROOT; ?>procounsellor/pc_counselors" class="dd-content <?php echo ($currentPage === 'pc_counselors') ? 'active' : ''; ?> " id="sb-link6">Counselors</a>
                <a href="<?php echo URLROOT; ?>procounsellor/pc_doctors" class="dd-content <?php echo ($currentPage === 'pc_doctors') ? 'active' : ''; ?> " id="sb-link7">Psychiatrists</a>
            </div>
            <a href="<?php echo URLROOT; ?>procounsellor/pc_timeslot" class="top <?php echo ($currentPage === 'pc_timeslot') ? 'active' : ''; ?> " id="sb-link9">Timeslots</a>
        </div>

        <div class="sidebar-container3">
            <a href="" class="bottom">Help & Info</a>
            <a href="<?php echo URLROOT; ?>procounsellor/pc_feedback" class="bottom">Feedback</a>
            <a href="<?php echo URLROOT; ?>users/logout" class="bottom">Log out</a>
        </div>
    </div>

    <script src="<?php echo JS; ?>sidebar.js"></script>
</body>