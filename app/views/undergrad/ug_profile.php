<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Profile</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>

                <div class="card-white">
                    <p class="p-regular-grey">User Account</p>
                    <div class="subgrid-4">

                        <div class="rectangle">
                            <p>General</p>
                            <table>
                                <tr>
                                    <td class="p-regular-grey">Username</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title">User_01</td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Age</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title">21</td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Gender</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title">Male</td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">E-mail</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title">2021is099@ucsc.cmb.lk</td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Faculty</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title">UCSC</td>
                                </tr>
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Password</p>
                            <form action="" class="subgrid-1">
                                <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" id="fname" placeholder="" class="form-default">
                                <label for="fname" class="p-regular-grey">New Password:</label>
                                <input type="password" id="fname" placeholder="" class="form-default">
                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" id="fname" placeholder="" class="form-default">
                                <button class="button-main">Change</button>
                            </form>
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>
    </section>
</body>
</html>