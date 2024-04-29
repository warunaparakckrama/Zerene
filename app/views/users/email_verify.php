<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Verification</title>
</head>

<body>
    <section class="sec-login">
        <div class="log-grid-1">
            <img src="<?php echo IMG; ?>logo - main black.svg" alt="zerene logo main black" width="230" height="38">
        </div>
        <div class="log-grid-2">
            <img src="<?php echo IMG; ?>verify.svg" alt="login" width="496" height="204" style="padding-bottom: 0px;">
        </div>
        <div class="log-grid-3">
            <p class="p-regular-green" style="margin-bottom: 10px;">Email Verification</p>
            <p class="p-regular-grey" style="font-size: 15px;">We have sent you a verification code to <b><?php echo $data['masked_email'];?></b>.</p>
            <p class="p-regular-grey" style="font-size: 15px;"> Please enter the 6-digit code to verify your email</p><br>

            <form action="<?php echo URLROOT;?>Users/verifyEmailcode/<?php echo $data['user_id'];?>" method="POST">
                <div class="log-subgrid-1" style="margin-bottom: 10px;">
                    <label for="" style="font-size: 15px; color: var(--zerene-green)">Verification code</label>
                    <input type="text" name="verify_code" class="form-signup" required>

                    <p class="p-error" style="font-size: 15px;"><?php echo isset($data['verify_alert']) ? $data['verify_alert'] : ''; ?></p>
                </div>
                <div class="log-su
                bgrid-1" style="align-items:center; justify-content: center;">
                    <button class="button-main" type="submit">Verify</button>
                </div>
            </form>

            <p class="p-regular-grey" style="font-size: 15px;">Didn't get the code? <a href="<?php echo URLROOT;?>Users/resendVerifyEmail/<?php echo $data['user_id']?>" style="color: var(--zerene-black);">Send Again</a></p>
            <p class="p-regular-grey" style="font-size: 15px;"><a href="<?php echo URLROOT;?>" style="color: var(--zerene-black);">Back to Home</a></p>
        </div>
    </section>
</body>

</html>