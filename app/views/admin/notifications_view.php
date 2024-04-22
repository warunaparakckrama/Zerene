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
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
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

                <p class="p-regular-green">Edit Notification</p>
                <div class="card-white">
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT; ?>Admin/editNotifications/<?php echo $notification->notification_id; ?>" method="POST">
                            <div style="font-size: 15px;">
                                <label for="subject">Subject: </label>
                                <input type="text" name="subject" placeholder="Enter your subject here" style="font-size: 15px; width: 50%;" required>
                                <br><br>

                                <label for="user_type">User Type: </label>
                                <select name="user_type" class="option">
                                    <option value="all users" <?php echo ($data['user_type'] === 'all users') ? 'selected' : ''; ?>>All Users</option>
                                    <option value="admin" <?php echo ($data['user_type'] === 'admin') ? 'selected' : ''; ?>>Administrators</option>
                                    <option value="undergrad" <?php echo ($data['user_type'] === 'undergrad') ? 'selected' : ''; ?>>Undergraduates</option>
                                    <option value="academic" <?php echo ($data['user_type'] === 'academic') ? 'selected' : ''; ?>>Counsellors (Academic)</option>
                                    <option value="professional" <?php echo ($data['user_type'] === 'professional') ? 'selected' : ''; ?>>Counsellors (Professional)</option>
                                    <option value="doctors" <?php echo ($data['user_type'] === 'doctor') ? 'selected' : ''; ?>>Psychiatrists</option>
                                </select><br>

                                <label for="content">Content: </label>
                                <textarea name="content" rows="10" placeholder="Enter your message here" class="textarea-1" required></textarea>
                                <p></p><br>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Edit</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
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