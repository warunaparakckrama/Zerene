<?php
$currentPage = 'ad_support';
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
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Feedback</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($data['feedback'] as $feedback) : ?>
                                    <tr>
                                        <td><?php echo $feedback->username ?></td>
                                        <td><?php echo $feedback->email ?></td>
                                        <td><?php echo $feedback->title ?></td>
                                        <td><?php echo $feedback->status ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>admin/support_view/<?php echo $feedback->feedback_id; ?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                <!-- <?php if ($feedback->status == 'resolved') : ?>
                                                    <button class="button-second" disabled>Resolved</button>
                                                    <?php else : ?>
                                                    <a href="<?php echo URLROOT; ?>Admin/resolveFeedback/<?php echo $feedback->feedback_id; ?>" style="text-decoration: none;"><button class="button-main" onclick="confirmResolve(event)">Resolve</button></a>
                                                <?php endif; ?> -->
                                                <a href="<?php echo URLROOT; ?>Admin/delFeedback/<?php echo $feedback->feedback_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Complaints</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($data['complaint'] as $complaint) : ?>
                                    <tr>
                                        <td><?php echo $complaint->username ?></td>
                                        <td><?php echo $complaint->email ?></td>
                                        <td><?php echo $complaint->title ?></td>
                                        <td><?php echo $complaint->status ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <div class="btn-container">
                                                    <a href="<?php echo URLROOT; ?>admin/support_view/<?php echo $complaint->feedback_id; ?>" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                    <!-- <?php if ($complaint->status == 'resolved') : ?>
                                                        <button class="button-second" disabled>Resolved</button>
                                                        <?php else : ?>
                                                        <a href="<?php echo URLROOT; ?>Admin/resolveFeedback/<?php echo $complaint->feedback_id; ?>" style="text-decoration: none;"><button class="button-main" onclick="confirmResolve(event)">Resolve</button></a>
                                                    <?php endif; ?> -->
                                                    <a href="<?php echo URLROOT; ?>Admin/delFeedback/<?php echo $complaint->feedback_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
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
                // If the user confirms the resolvement, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }
    </script>
</body>
<!-- </html> -->