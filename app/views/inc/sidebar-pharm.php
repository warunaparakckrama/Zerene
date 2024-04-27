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
                <img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="80" height="80">
            </a>
            <p class="p-regular" style="color: var(--zerene-light);"><?php echo $_SESSION['user_name']; ?></p>
            <a href="<?php echo URLROOT;?>pharmacy/pharm_profile" style="text-decoration: none;"><button class="button-second">View Profile</button></a>
        </div>
        <div class="sidebar-container-3">
            <a href="<?php echo URLROOT;?>pharmacy/pharm_home" class="top <?php echo ($currentPage === 'pharm_home') ? 'active' : ''; ?>" >Home</a>
            <a href="<?php echo URLROOT;?>pharmacy/pharm_prescriptions" class="top <?php echo ($currentPage === 'pharm_prescriptions') ? 'active' : ''; ?>" >Prescriptions</a>
        </div>
        
        <div class="sidebar-container-3">
            <a href="<?php echo URLROOT; ?>users/logout" class="bottom">Log out</a>
        </div>
    </div>

    <script src="<?php echo JS; ?>sidebar.js"></script>
</body>