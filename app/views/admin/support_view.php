<?php
$currentPage = 'support';
$feedback = $data['feedback'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Support</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Support</p>
                </div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
            </div>

            <div>
                <p class="p-regular-green"><?php echo $feedback->type; ?> | (case No. <?php echo $feedback->feedback_id; ?>)</p>
                <div class="card-white">
                    <div class="card-green-3" style="font-size: 15px;">
                        <div>
                            <p class="p-regular-green"><b>Username: </b><?php echo $feedback->username; ?></p>
                            <p class="p-regular-green"><b>Email: </b><?php echo $feedback->email; ?></p>
                            <p class="p-regular-green"><b>Title: </b><?php echo $feedback->title; ?></p>
                            <p class="p-regular-green"><b>Status: </b><?php echo $feedback->status; ?></p><br>
                            <p class="p-regular-green" style="text-align:justify;"><b>Content: </b><?php echo $feedback->content; ?></p><br>

                            <div class="btn-container-2">
                                <?php if ($feedback->status == 'resolved') : ?>
                                    <p class="p-regular-green"><b>Comment: </b><?php echo $feedback->comment; ?></p><br>
                                    <button class="button-second" disabled>Resolved</button>
                                <?php else : ?>
                                    <form action="<?php echo URLROOT;?>Admin/resolveFeedback/<?php echo $feedback->feedback_id;?>" method="POST">
                                        <div class="btn-container">
                                            <label for="title">Comment: </label>
                                            <input type="text" name="comment" class="" value="" required>

                                            <button class="button-main" type="submit">Resolve</button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                                <a href="<?php echo URLROOT; ?>Admin/delFeedback/<?php echo $feedback->feedback_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Remove</button></a>
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