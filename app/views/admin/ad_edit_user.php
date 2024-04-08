    <?php $currentPage = 'ad_users'; ?>
    <?php $user = $data['user']; ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>

    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">

                <div class="subgrid-1">
                        <p class="p-title" style="font-size: 40px;">Users</p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Edit Account</p>

                        <div class="card-green-3">
                            <div class="subgrid-4">

                                <div class="rectangle">
                                    <p>General</p>
                                    <table>
                                        <tr>
                                            <td class="p-regular-grey">Username</td>
                                            <td class="p-regular-grey">:</td>
                                            <td class="p-title"><?php echo $user->username;?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-regular-grey">Email</td>
                                            <td class="p-regular-grey">:</td>
                                            <td class="p-title"><?php echo $user->email;?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-regular-grey">User Type</td>
                                            <td class="p-regular-grey">:</td>
                                            <td class="p-title"><?php echo $user->user_type;?></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="rectangle">
                                    <p>Change User Password</p>
                                    <form action="<?php echo URLROOT;?>Admin/changePwdUser/<?php echo $user->user_id;?>" method="POST" class="subgrid-1">
                                        <label for="" class="p-regular-grey" style="font-size: 15px;">New Password :</label>
                                        <input type="password" id="new_password" name="new_password" class="form-default">
                                        <label for="" class="p-regular-grey" style="font-size: 15px;">Confirm New Password :</label>
                                        <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="form-default">
                                        <div class="btn-container-2" style="margin-top: 20px;">
                                            <button class="button-main" type="submit" onclick="confirmEditPassword(event)">Change</button>
                                            <button class="button-danger" type="reset">Cancel</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="rectangle">
                                    <p>Change Username</p>
                                    <form action="<?php echo URLROOT;?>Admin/changeUsernameUser/<?php echo $user->user_id;?>" method="POST" class="subgrid-1">
                                        <label for="cusername" class="p-regular-grey">Current Username :</label>
                                        <input type="text" id="current_username" name="current_username" class="">
                                        <label for="nusername" class="p-regular-grey">New Username :</label>
                                        <input type="text" id="new_username" name="new_username" class="form-default">
                                        <div class="btn-container-2">
                                            <button class="button-main" type="submit" onclick="confirmEditUsername(event)">Change</button>
                                            <button class="button-danger" type="reset">Cancel</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <script>
            function confirmEditUsername(event) {
            
            if (!confirm("You're about to change the Username. Proceed?")) {
                event.preventDefault(); // Prevent the default action of the link
            }
            }

            function confirmEditPassword(event) {
            
            if (!confirm("You're about to change the Password. Proceed?")) {
                event.preventDefault(); // Prevent the default action of the link
            }
            }
        </script>

    </body>