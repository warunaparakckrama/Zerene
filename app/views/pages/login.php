<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Zerene - Login</title>
    </head>
    <body>
        <section class="sec-login">
            <div class="log-grid-container1">
                <img src="images/logo - main black.svg" alt="zerene logo main black" width="230" height="38">
            </div>
            <div class="log-grid-container2">
                <img src="images/login.svg" alt="login" width="496" height="204" style="padding-bottom: 0px;">
            </div>
            <div class="log-grid-container3">
                <div class="log-sub-container1">
                    <p class="p-regular">Username</p>
                    <input type="text" id="username" class="input" placeholder="username" style="margin-bottom: 10px;">
                    <p class="p-regular">Password</p>
                    <input type="password" id="password" class="input" placeholder="password">
                </div>
                <div class="log-sub-container2">
                    <p class="p-regular" style="font-size: 15px;;">Forgot Password?</p>
                </div>
                <div class="log-sub-container1" style="justify-items: center;">
                    <button class="button-main">Log in</button>
                    <p class="p-regular">Dont' have an Account? <a href="signup.php" style="color: var(--zerene-black);">Sign Up</a></p>
                </div>
            </div>
        </section>  
    </body>
</html>