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
                <a href="<?php echo URLROOT; ?>admin/ad_home" class="top" id="sb-link1">Home</a>
                <a href="<?php echo URLROOT; ?>admin/ad_registrations" class="top" id="sb-link2">Registrations</a>
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