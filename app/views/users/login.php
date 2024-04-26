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
                        <input type="text" name="username" placeholder="username" style="margin-bottom: 10px; " class="input" value="<?php echo $data['username']; ?>" required>
                        
                        <p class="p-regular-grey">Password<sup>*</sup></p>
                        <input type="password" id="password" name="password" placeholder="password" class="input" value="<?php echo $data['password']; ?>" required>
                        
                    </div>
                    <div class="log-subgrid-2">
                        <p class="p-regular" style="font-size: 15px;">Forgot Password?</p>
                    </div>
                    <p class="p-error" style="font-size: 15px;"><?php echo isset($data['login_alert']) ? $data['login_alert'] : ''; ?></p>
                    <div class="log-subgrid-1" style="justify-items: center;">
                        <button class="button-main" type="submit">Log in</button>
                    </div>
                </form>

                <p class="p-regular-green" style="font-size: 15px;">Don't have an Account? <a href="<?php echo URLROOT;?>users/signup" style="color: var(--zerene-green);">Sign Up</a></p>
            </div>
        </section>  
    </body>
</html>