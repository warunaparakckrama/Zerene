    <?php $currentPage = 'ad_reg_doctor'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Administrator</title>
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">

                <div class="subgrid-1">
                        <p class="p-title" style="font-size: 40px;">Registrations</p>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular">Create Account (Psychiatrist)</p>

                        <div class="card-green">
                            <form action="<?php echo URLROOT;?>admin/ad_reg_doctor" method="POST">
                                <div style="font-size: 15px;">

                                    <label for="fname">First Name: </label>
                                    <input type="text" name="fname" placeholder="Enter First Name" class="<?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
                                    <p class="p-error"><?php echo $data['fname_err']; ?></p><br>

                                    <label for="lname">Last Name: </label>
                                    <input type="text" name="lname" placeholder="Enter Last Name" class="<?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
                                    <p class="p-error"><?php echo $data['lname_err']; ?></p><br>

                                    <label for="gender">Gender: </label>
                                    <select name="gender" id="">
                                        <option value="Male" <?php echo ($data['gender'] === 'Male') ? 'selected' : ''; ?> >Male</option>
                                        <option value="Female" <?php echo ($data['gender'] === 'Female') ? 'selected' : ''; ?> >Female</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="hospital">Hospital in Charge: </label>
                                    <select name="hospital" id="">
                                        <option value="General Hospital - Colombo" <?php echo ($data['hospital'] === 'General Hospital - Colombo') ? 'selected' : ''; ?> >General Hospital - Colombo</option>
                                        <option value="Teaching Hospital - Ragama" <?php echo ($data['hospital'] === 'Teaching Hospital - Ragama') ? 'selected' : ''; ?> >Teaching Hospital - Ragama</option>
                                        <option value="Teaching Hospital - Lady Ridgeway Hospital for Children" <?php echo ($data['hospital'] === 'Teaching Hospital - Lady Ridgeway Hospital for Children') ? 'selected' : ''; ?> >Teaching Hospital - Lady Ridgeway Hospital for Children</option>
                                        <option value="Mental Hospital - Angoda" <?php echo ($data['hospital'] === 'Mental Hospital - Ragama') ? 'selected' : ''; ?> >Mental Hospital - Angoda</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="university">University in Charge: </label>
                                    <select name="university" id="">
                                        <option value="University of Colombo" <?php echo ($data['university'] === 'University of Colombo') ? 'selected' : ''; ?> >University of Colombo</option>
                                        <option value="University of Kelaniya" <?php echo ($data['university'] === 'University of Kelaniya') ? 'selected' : ''; ?> >University of Kelaniya</option>
                                        <option value="University of Sri Jayawardanapura" <?php echo ($data['university'] === 'University of Sri Jayawardanapura') ? 'selected' : ''; ?> >University of Sri Jayawardanapura</option>
                                        <option value="University of Moratuwa" <?php echo ($data['university'] === 'University of Moratuwa') ? 'selected' : ''; ?> >University of Moratuwa</option>
                                    </select>
                                    <p class="p-error"></p><br>

                                    <label for="email">Email: </label>
                                    <input type="email" name="email" placeholder="Enter Email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                    <p class="p-error"><?php echo $data['email_err']; ?></p><br>
       
                                    <label for="contact_num">Contact Number: </label>
                                    <input type="tel" name="contact_num" placeholder="format: 012 345 6789" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" class="<?php echo (!empty($data['contact_num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_num']; ?>">
                                    <p class="p-error"><?php echo $data['contact_num_err']; ?></p><br>

                                    <label for="username">Username: </label>
                                    <input type="text" name="username" placeholder="Enter Username" class="<?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                                    <p class="p-error"><?php echo $data['username_err']; ?></p><br>

                                    <label for="password">Password: </label>
                                    <input type="password" name="password" placeholder="Enter Password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <p class="p-error"><?php echo $data['password_err']; ?></p><br>

                                    <button class="button-main" type="submit">Register</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </body>
