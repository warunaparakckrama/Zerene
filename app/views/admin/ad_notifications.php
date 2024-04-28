<?php
    $currentPage = 'ad_notifications';
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
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Notifications</p>
                </div>

            </div>

            <div>
                <p class="p-regular-green">Current Notifications</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Subject</th>
                                    <th>User Type</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($data['notifications'] as $notifications) : ?>
                                    <tr>
                                        <td><?php echo $notifications->notification_id ?></td>
                                        <td><?php echo $notifications->author ?></td>
                                        <td><?php echo $notifications->subject ?></td>
                                        <td><?php echo $notifications->user_type ?></td>
                                        <?php $dateTime = new DateTime($notifications->created_at); $formattedDateTime = $dateTime->format('jS M, y \|\ h:iA');?>
                                        <td><?php echo $formattedDateTime ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>Admin/notifications_view/<?php echo $notifications->notification_id; ?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                <a href="<?php echo URLROOT; ?>Admin/deleteNotifications/<?php echo $notifications->notification_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Create Notifications</p>
                <div class="card-white">
                    <div class="card-green-5">
                        <form action="<?php echo URLROOT; ?>Admin/submitNotifications/<?php echo $_SESSION['user_id']; ?>" method="POST">
                            <div style="font-size: 15px;">
                                <label for="subject">Subject: </label>
                                <input type="text" name="subject" class="input" placeholder="Enter your subject here" style="width: 50%; font-size: 15px;" required>
                                <br><br>

                                <label for="user_type">User Type: </label>
                                <select name="user_type" id="" class="option">
                                    <option value="all users" <?php echo ($data['user_type'] === 'all users') ? 'selected' : ''; ?>>All Users</option>
                                    <option value="admin" <?php echo ($data['user_type'] === 'admin') ? 'selected' : ''; ?>>Administrators</option>
                                    <option value="undergraduate" <?php echo ($data['user_type'] === 'undergraduate') ? 'selected' : ''; ?>>Undergraduates</option>
                                    <option value="acounsellor" <?php echo ($data['user_type'] === 'acounsellor') ? 'selected' : ''; ?>>Counsellors (Academic)</option>
                                    <option value="pcounsellor" <?php echo ($data['user_type'] === 'pcounsellor') ? 'selected' : ''; ?>>Counsellors (Professional)</option>
                                    <option value="doctor" <?php echo ($data['user_type'] === 'doctor') ? 'selected' : ''; ?>>Psychiatrists</option>
                                </select><br><br>

                                <label for="content">Content: </label>
                                <textarea name="content" rows="10" placeholder="Enter your message here" class="textarea-1" required></textarea>
                                <p></p><br>

                                <div class="btn-container-2">
                                    <button class="button-main" type="submit">Submit</button>
                                    <button class="button-danger" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default action of the link
            if (confirm("Are you sure you want to delete this notification?")) {
                // If the user confirms the deletion, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }
    </script>
</body>
<!-- </html> -->