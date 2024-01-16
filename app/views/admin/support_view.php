<?php $currentPage = 'support'; ?>
<?php $feedback = $data['feedback']; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Notifications</title>
    </head>

    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Support</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class=""><?php echo $feedback->type;?> | (case No. <?php echo $feedback->feedback_id;?>)</p>
                        <div class="card-green-3">
                            <div>
                                <p class="p-regular-green" style="font-size: 15px;"><b>Username: </b><?php echo $feedback->username;?></p>
                                <p class="p-regular-green" style="font-size: 15px;"><b>Email: </b><?php echo $feedback->email;?></p>
                                <p class="p-regular-green" style="font-size: 15px;"><b>Title: </b><?php echo $feedback->title;?></p>
                                <p class="p-regular-green" style="font-size: 15px;"><b>Status: </b><?php echo $feedback->status;?></p><br>
                                <p class="p-regular-green" style="font-size: 15px; text-align:justify;"><b>Content: </b><?php echo $feedback->content;?></p><br>
                                <div class="btn-container-2">
                                    <a href="<?php echo URLROOT;?>Admin/resolveFeedback<?php echo $feedback->feedback_id;?>" style="text-decoration: none;"><button class="button-main" onclick="confirmResolve(event)">Resolve</button></a>
                                    <a href="<?php echo URLROOT;?>Admin/delFeedback/<?php echo $feedback->feedback_id;?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Remove</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function confirmDelete(event) {
                event.preventDefault(); // Prevent the default action of the link
                if (confirm("Are you sure you want to delete this feedback/ complaint?")) {
                    // If the user confirms the deletion, proceed with the link action
                    window.location.href = event.target.parentElement.href; // Redirect to the link URL
                } else {
                    // If the user cancels, do nothing or handle as needed
                }
            }

            function confirmResolve(event) {
                event.preventDefault(); // Prevent the default action of the link
                if (confirm("Are you sure you want to mark this feedback/ complaint as 'Resolved'? ")) {
                    // If the user confirms the deletion, proceed with the link action
                    window.location.href = event.target.parentElement.href; // Redirect to the link URL
                } else {
                    // If the user cancels, do nothing or handle as needed
                }
            }
        </script>
    </body>
