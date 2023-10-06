<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>main.css">
    <title>Sign Up - Zerene</title>
</head>
    <body>
        <section class="sec-signup">
            <div class="grid-signup-1">
                <p class="p-regular">Undergraduate</p>
                <p class="p-bold" style="font-size: 50px; padding-bottom: 10px;">Sign Up</p>
                <p style="padding-bottom: 10px;">Enter following details to create your free account!</p>
                <div class="grid-signup-form">
                    <input type="text" id="signup-age" placeholder="Age" class="form-signup">
                    <input type="text" id="signup-gender" placeholder="Gender" class="form-signup">
                    <input type="text" id="signup-stumail" placeholder="Student Mail" class="form-signup">
                    <input type="text" id="signup-uni" placeholder="University" class="form-signup">
                    <input type="text" id="signup-fac" placeholder="Faculty" class="form-signup">
                    <input type="text" id="signup-year" placeholder="Year of Study" class="form-signup">
                    <input type="password" id="signup-password" placeholder="Create Password" class="form-signup">
                    <input type="password" id="signup-rpassword" placeholder="Re-enter Password" class="form-signup">
                    <button class="button-main" style="margin-left: 0px;">Sign Up</button>
                </div>
            </div>
            <div class="grid-signup-2">
                <img src="<?php echo IMG;?>signup.svg" alt="signup" width="400" height="400.53">
                <p class="p-regular">Already have an Account? <a href="<?php echo URLROOT;?>users/login" style="color: var(--zerene-black);">Log in</p>
            </div>
        </section>
    </body>
</html>