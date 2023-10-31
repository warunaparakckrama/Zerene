<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title>Document</title>
</head>
    <body>
        <section>
            <div class="grid-1">

                <div class="subgrid-1">
                        <p class="p-title" style="font-size: 40px;">Registrations</p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Select User Type</p>
                    </div>
                    <div class="card-white">
                        <p class="p-regular">Create Account</p>
                        <div>
                            <form action="" class="subgrid-1">
                                <label for="fname" class="p-regular-grey">First Name</label>
                                <input type="text" id="fname" placeholder="Enter First Name" class="form-default">
                                <label for="fname" class="p-regular-grey">Last Name</label>
                                <input type="text" id="fname" placeholder="Enter Last Name" class="form-default">
                                <label for="fname" class="p-regular-grey">Gender</label>
                                <div>
                                    <input type="radio" id="html" name="fav_language" value="HTML">
                                    <label for="fname" class="p-regular-grey">Male</label>
                                    <input type="radio" id="html" name="fav_language" value="HTML">
                                    <label for="fname" class="p-regular-grey">Female</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </body>
</html>