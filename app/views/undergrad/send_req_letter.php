<?php $currentPage = 'request_letters';?>
<?php 
    $id = $data['id'];
    $undergrad = $data['undergrad'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Professionals</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Request Letters</p></div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular-green">Send a Request Letter</p>
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT;?>Undergrad/submitRequestLetter/<?php echo $undergrad->user_id;?>" class="" enctype="multipart/form-data" method="POST">
                            <div style="font-size: 18px; color: var(--zerene-green)">
                                <input type="hidden" name="coun_user_id" value="<?php echo $id;?>">    

                                <label for="subject">Subject: </label>
                                <input type="text" name="subject" placeholder="enter your subject here" class="input" required><br><br>

                                <label for="content">Content: </label><br>
                                <textarea name="content" id="" rows="10" class="textarea-1" required></textarea><br><br>

                                <label for="document">Attach any documents here: (pdf only)</label>
                                
                                <input type="file" id="document" name="document" accept=".pdf" class="button-second"><br><br>

                                <!-- Display file upload error if it exists -->
                                <?php if (!empty($data['upload_error'])): ?>
                                    <p class="error-message" style="color: red;"><?php echo $data['upload_error']; ?></p>
                                <?php endif; ?>

                               <button class="button-main" type="submit">Send Letter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>