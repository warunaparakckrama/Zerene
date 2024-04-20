<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
</head>

<body>
    <div class="sidebar-grid">
        <div class="sidebar-container1">
            <img src="<?php echo IMG; ?>logo - white.svg" alt="logo white" width="213" height="35.18">
        </div>

        <div class="sidebar-container2">
            <a href="#">
                <img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="80" height="80">
            </a>
            <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name']; ?></p>
            <a href="<?php echo URLROOT; ?>admin/ad_profile" id="sb-link10" style="text-decoration: none;"><button class="button-second">View Profile</button></a>
        </div>

        <div class="sidebar-container3">
            <a href="<?php echo URLROOT; ?>admin/ad_home" class="top <?php echo ($currentPage === 'ad_home') ? 'active' : ''; ?>" id="sb-link1">Home</a>
            <a href="#" class="top dd-btn <?php echo ($currentPage === 'ad_registrations') ? 'active' : '';?>">Registrations</a>
            <div class="dropdown-container">
                <a href="<?php echo URLROOT; ?>admin/ad_reg_admin" class="dd-content">Administrators</a>
                <a href="<?php echo URLROOT; ?>admin/ad_reg_counselor" class="dd-content">Counsellors</a>
                <a href="<?php echo URLROOT; ?>admin/ad_reg_doctor" class="dd-content">Psychiatrists</a>
            </div>
            <a href="<?php echo URLROOT; ?>admin/verifications" class="top <?php echo ($currentPage === 'verifications') ? 'active' : ''; ?>" id="sb-link5">Verifications</a>
            <a href="<?php echo URLROOT; ?>admin/ad_users" class="top <?php echo ($currentPage === 'ad_users') ? 'active' : ''; ?>" id="sb-link6">Users</a>
            <a href="<?php echo URLROOT; ?>admin/notifications" class="top <?php echo ($currentPage === 'notifications') ? 'active' : ''; ?>" id="sb-link7">Notifications</a>
            <a href="<?php echo URLROOT; ?>admin/newsletters" class="top <?php echo ($currentPage === 'newsletters') ? 'active' : ''; ?>" id="sb-link8">Newsletters</a>
            <a href="<?php echo URLROOT; ?>admin/support" class="top <?php echo ($currentPage === 'support') ? 'active' : ''; ?>" id="sb-link9">Support</a>
        </div>

        <div class="sidebar-container3">
            <a href="<?php echo URLROOT; ?>users/logout" class="bottom">Log out</a>
        </div>

    </div>

    <script src="<?php echo JS; ?>sidebar.js"></script>
</body>