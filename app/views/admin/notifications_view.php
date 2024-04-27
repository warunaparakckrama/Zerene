<?php
    $currentPage = 'ad_notifications';
    $notification = $data['notification'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Notifications</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Notifications</p></div>
            </div>

            <div>
                <p class="p-regular-green">Notification | (No. <?php echo $notification->notification_id; ?>)</p>
                <div class="card-white">
                    <div class="card-green-5">
                        <div style="font-size: 15px;">
                            <p class="p-regular-green"><b>Author: </b><?php echo $notification->author; ?></p>
                            <p class="p-regular-green"><b>Subject: </b><?php echo $notification->subject; ?></p>
                            <p class="p-regular-green"><b>User Type: </b><?php echo $notification->user_type; ?></p>
                            <?php $dateTime = new DateTime($notification->created_at); $formattedDateTime = $dateTime->format('jS M, y \|\ h:iA');?>
                            <p class="p-regular-green"><b>Created at: </b><?php echo $formattedDateTime; ?></p><br>
                            <p class="p-regular-green"><b>Content: </b><?php echo $notification->content; ?></p><br>
                            <div class="btn-container-2">
                                <a href="<?php echo URLROOT; ?>Admin/deleteNotifications/<?php echo $notification->notification_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Remove</button></a>
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
            if (confirm("Are you sure you want to delete this Notification?")) {
                // If the user confirms the deletion, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }

        function confirmEdit(event) {
            event.preventDefault(); // Prevent the default action of the link
            if (confirm("Are you sure you want to edit this Notification?")) {
                // If the user confirms the edit, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }
    </script>
</body>