<?php $currentPage = 'ad_pharmacies'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Pharmacies</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Pharmacies</p></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Create Account (Pharmacy)</p>

                    <div>
                        <form action="<?php echo URLROOT;?>Admin/ad_pharmacies" method="POST">
                            <div class="card-green-2" style="font-size: 15px;">
                                <label for="name">Pharamcy Name: </label>
                                <input type="text" name="name" placeholder="Enter Pharmacy Name" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 10px;" required>

                                <label for="email">Pharamcy Address: </label>
                                <input type="text" name="address" placeholder="Enter Pharmacy Address" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 10px;" required>

                                <label for="email">Pharamcy Email: </label>
                                <input type="email" name="email" placeholder="Enter Pharmacy Email" class="form-signup" style="width: 50%;" required>

                                <label for="password">Contact Number: </label>
                                <input type="text" name="contact_num" placeholder="Enter contact number" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 10px;" value="" required>

                                <label for="username">Username: </label>
                                <input type="text" name="username" placeholder="Enter Username" class="form-signup" style="width: 50%; font-size: 15px; padding-left: 10px;" required>

                                <label for="password">Password: </label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-signup" style="width: 50%;" required>

                                <label for="password">Confirm Password: </label>
                                <input type="password" name="confirm_password" placeholder="Enter Password" class="form-signup" style="width: 50%;" required>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Register</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>

                                <p class="p-error"><?php echo isset($data['signup_alert']) ? $data['signup_alert'] : '';?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>