<?php $currentPage = 'ad_users'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Users</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Users</p>
                </div>
                <div><img src="<?php echo IMG; ?>zerene-admin.svg" alt="ug avatar" width="40" height="40" style="float: inline-end;"></div>
            </div>

            <div>
                <p class="p-regular-green">Undergraduates</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>University</th>
                                    <th>Faculty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['undergrads'] as $undergrad) : ?>
                                    <tr>
                                        <td><?php echo $undergrad->user_id ?></td>
                                        <td><?php echo $undergrad->username ?></td>
                                        <td><?php echo $undergrad->university ?></td>
                                        <td><?php echo $undergrad->faculty ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>Admin/ad_edit_user/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;"><button class="button-main">Edit</button></a>
                                                <a href="<?php echo URLROOT; ?>Users/deleteUG/<?php echo $undergrad->user_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Counsellors</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['counselors'] as $counselor) : ?>
                                    <tr>
                                        <td><?php echo $counselor->user_id ?></td>
                                        <td><?php echo $counselor->coun_type ?></td>
                                        <td><?php echo $counselor->first_name ?></td>
                                        <td><?php echo $counselor->last_name ?></td>
                                        <td><?php echo $counselor->username ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>Admin/ad_edit_user/<?php echo $counselor->user_id; ?>" style="text-decoration: none;"><button class="button-main">Edit</button></a>
                                                <a href="<?php echo URLROOT; ?>Users/deleteCoun/<?php echo $counselor->user_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Psychiatrists</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Hospital</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data['doctors'] as $doctor) : ?>
                                    <tr>
                                        <td><?php echo $doctor->user_id ?></td>
                                        <td><?php echo $doctor->first_name ?></td>
                                        <td><?php echo $doctor->last_name ?></td>
                                        <td><?php echo $doctor->username ?></td>
                                        <td><?php echo $doctor->hospital ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>Admin/ad_edit_user/<?php echo $doctor->user_id; ?>" style="text-decoration: none;"><button class="button-main">Edit</button></a>
                                                <a href="<?php echo URLROOT; ?>Users/deleteDoc/<?php echo $doctor->user_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Pharmacies</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>Pharmacy Name</th>
                                    <th>Pharmacy Address</th>
                                    <th>Contact Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data['pharmacies'] as $pharmacies) : ?>
                                    <tr>
                                        <td><?php echo $pharmacies->pharmacy_name ?></td>
                                        <td><?php echo $pharmacies->pharmacy_address ?></td>
                                        <td><?php echo $pharmacies->contact_num ?></td>
                                        <td>
                                            <div class="btn-container-2">
                                                <a href="<?php echo URLROOT; ?>Admin/ad_edit_user/<?php echo $pharmacies->user_id; ?>" style="text-decoration: none;"><button class="button-main">Edit</button></a>
                                                <a href="<?php echo URLROOT; ?>Users/deleteDoc/<?php echo $pharmacies->user_id; ?>" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="p-regular-green">Administrators</p>
                <div class="card-white-table">
                    <div class="table-container">
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data['admins'] as $admin) : ?>
                                    <tr>
                                        <td><?php echo $admin->username ?></td>
                                        <td><?php echo $admin->email ?></td>
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
            if (confirm("Are you sure you want to delete this user?")) {
                // If the user confirms the deletion, proceed with the link action
                window.location.href = event.target.parentElement.href; // Redirect to the link URL
            } else {
                // If the user cancels, do nothing or handle as needed
            }
        }
    </script>
</body>