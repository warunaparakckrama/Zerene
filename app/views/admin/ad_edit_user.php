<?php
    $currentPage = 'ad_users';
    $user = $data['user'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo $user->username; ?> | Users</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">

            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Users</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <div class="card-white">
                    <div class="subgrid-4">

                        <div class="rectangle">
                            <p>General</p>
                            <table>
                                <tr>
                                    <td class="p-regular-grey">Username</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $user->username; ?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Email</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $user->email; ?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">User Type</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $user->user_type; ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change User Password</p>
                            <form action="<?php echo URLROOT; ?>Admin/changePwdUser/<?php echo $user->user_id; ?>" method="POST" class="subgrid-1" style="font-size: 15px;">
                                <input type="hidden" name="user_email" value="<?php echo $user->email;?>">

                                <label for="" class="p-regular-grey">Your Password :</label>
                                <input type="password" name="admin_password" required>

                                <label for="" class="p-regular-grey">New Password :</label>
                                <input type="password" name="new_password" required>

                                <label for="" class="p-regular-grey">Confirm New Password :</label>
                                <input type="password" name="confirm_password" required>

                                <div class="btn-container-2" style="margin-top: 10px;">
                                    <button class="button-main" type="submit">Change</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['password_alert']) ? $data['password_alert'] : ''; ?></p>
                            </form>
                        </div>

                        <div class="rectangle">
                            <p>Change Username</p>
                            <form action="<?php echo URLROOT; ?>Admin/changeUsernameUser/<?php echo $user->user_id; ?>" method="POST" class="subgrid-1" style="font-size: 15px;">
                                <input type="hidden" name="user_email" value="<?php echo $user->email;?>">

                                <label for="nusername" class="p-regular-grey">New Username :</label>
                                <input type="text" name="new_username" required>

                                <label for="" class="p-regular-grey">Your Password :</label>
                                <input type="password" name="admin_password" required>

                                <div class="btn-container-2" style="margin-top: 10px;">
                                    <button class="button-main" type="submit">Change</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                                <p class="p-error"><?php echo isset($data['username_alert']) ? $data['username_alert'] : ''; ?></p>
                            </form>
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