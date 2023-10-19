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
                <div class="log-subgrid-1">
                    <form action="/action_page.php">
                            <label for="cars" style="font-size: 15px;">Choose User Type<sup>*</sup>:</label>
                            <select name="users" id="users">
                            <option value="volvo">Undergraduate</option>
                            <option value="saab">Counsellor (Academic)</option>
                            <option value="audi">Counsellor (Professional)</option>
                            <option value="audi">Psychiatrist</option>
                            </optgroup>
                        </select>
                    </form>
                </div>
                <div class="log-subgrid-1">
                    <p class="p-regular">Username<sup>*</sup></p>
                    <input type="text" id="username" class="input" placeholder="username" style="margin-bottom: 10px;">
                    <p class="p-regular">Password<sup>*</sup></p>
                    <input type="password" id="password" class="input" placeholder="password">
                </div>
                <div class="log-subgrid-2">
                    <p class="p-regular" style="font-size: 15px;">Forgot Password?</p>
                </div>
                <div class="log-subgrid-1" style="justify-items: center;">
                    <button class="button-main">Log in</button>
                    <p class="p-regular">Don't have an Account? <a href="<?php echo URLROOT;?>users/signup" style="color: var(--zerene-black);">Sign Up</a></p>
                </div>
            </div>
        </section>  
    </body>
</html>