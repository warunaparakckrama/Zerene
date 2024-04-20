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
            <img src="<?php echo IMG; ?>ug-avatar1.svg" alt="ug avatar" width="80" height="80">
            <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name']; ?></p>
            <a href="<?php echo URLROOT; ?>undergrad/ug_profile" style="text-decoration: none;"><button class="button-second">View Profile</button></a>
        </div>
        <div class="sidebar-container3">
            <a href="<?php echo URLROOT; ?>undergrad/home" class="top <?php echo ($currentPage === 'home') ? 'active' : ''; ?>">Home</a>
            <a href="<?php echo URLROOT; ?>undergrad/questionnaires" class="top <?php echo ($currentPage === 'questionnaires') ? 'active' : ''; ?>">Questionnaires</a>
            <a href="<?php echo URLROOT; ?>undergrad/professionals" class="top <?php echo ($currentPage === 'professionals') ? 'active' : ''; ?>">Professionals</a>
            <a href="<?php echo URLROOT; ?>undergrad/home" class="top <?php echo ($currentPage === 'request_letters') ? 'active' : ''; ?>">Request Letters</a>
            <a href="<?php echo URLROOT; ?>undergrad/timeslots" class="top <?php echo ($currentPage === 'timeslots') ? 'active' : ''; ?>">Timeslots</a>
            <a href="<?php echo URLROOT; ?>undergrad/chats" class="top <?php echo ($currentPage === 'chats') ? 'active' : ''; ?>">Chats</a>
            <a href="<?php echo URLROOT; ?>undergrad/resources" class="top <?php echo ($currentPage === 'resources') ? 'active' : ''; ?>">Resources</a>
        </div>
        <div class="sidebar-container3">
            <a href="" class="bottom">Help & Info</a>
            <a href="<?php echo URLROOT; ?>undergrad/feedback" class="bottom <?php echo ($currentPage === 'feedback') ? 'active' : ''; ?>">Feedback</a>
            <a href="<?php echo URLROOT; ?>users/logout" class="bottom">Log out</a>
        </div>
    </div>

    <script src="<?php echo JS; ?>sidebar.js"></script>
</body>