<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>main.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?></title>
    </head>
    <body>
        <section class="sec-login">
            <div class="log-grid-1">
                <img src="<?php echo IMG;?>logo - main black.svg" alt="zerene logo main black" width="230" height="38">
            </div>
            <div class="log-grid-2">
                <img src="<?php echo IMG;?>login.svg" alt="login" width="496" height="204" style="padding-bottom: 0px;">
            </div>
            <div class="log-grid-3">

                <form action="<?php echo URLROOT;?>users/login" method="POST">
                    <div class="log-subgrid-1" style="font-size: 18px;">
                        <p class="p-regular-grey">Username<sup>*</sup></p>
                        <input type="text" name="username" placeholder="username" style="margin-bottom: 10px; " class="input <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                        <p class="p-error"><?php echo $data['username_err']; ?></p>
                        <p class="p-regular">Password<sup>*</sup></p>
                        <input type="password" id="password" name="password" placeholder="password" class="input <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <p class="p-error"><?php echo $data['password_err']; ?></p>
                    </div>
                    <div class="log-subgrid-2">
                        <p class="p-regular" style="font-size: 15px;">Forgot Password?</p>
                        <p class="p-error" style="font-size: 15px;"><?php echo isset($data['verify_code_alert']) ? $data['verify_code_alert'] : ''; ?></p>
                    </div>
                    <div class="log-subgrid-1" style="justify-items: center;">
                        <button class="button-main" type="submit">Log in</button>
                    </div>
                </form>

                <p class="p-regular-green" style="font-size: 15px;">Don't have an Account? <a href="<?php echo URLROOT;?>users/signup" style="color: var(--zerene-green);">Sign Up</a></p>
            </div>
        </section>  
    </body>
</html>