<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section>
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Users</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>

                <!-- <div class="card-white">
                    <p class="p-regular-grey">Total Users</p>
                    <div class="subgrid-5">

                        <div class="rectangle">
                        <p class="p-regular-grey">Administrators</p>
                        <p>2</p>
                        </div>

                        <div class="rectangle">
                        <p class="p-regular-grey">Undergraduates</p>
                        <p>2</p>
                        </div>

                        <div class="rectangle">
                        <p class="p-regular-grey">Counselors</p>
                        <p>2</p>
                        </div>

                        <div class="rectangle">
                        <p class="p-regular-grey">Psychiatrists</p>
                        <p>2</p>
                        </div>

                    </div>
                </div> -->

                <div class="card-white">
                    <p class="p-regular-grey">Undergraduates</p>
                    <div>
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>UG ID</th>
                                    <th>Username</th>
                                    <th>University</th>
                                    <th>Faculty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data['undergrads'] as $undergrad) : ?>
                                <tr>
                                    <td><?php echo $undergrad->user_id?></td>
                                    <td><?php echo $undergrad->ug_id?></td>
                                    <td><?php echo $undergrad->username?></td>
                                    <td><?php echo $undergrad->university?></td>
                                    <td><?php echo $undergrad->faculty?></td>
                                    <td>
                                        <div class="btn-container-2">
                                            <div class="btn-container">
                                                <form action="" method="POST">
                                                    <button class="button-main">Edit</button>
                                                </form>
                                            </div>

                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT;?>Users/deleteUG/<?php echo $undergrad->user_id;?>" style="text-decoration: none;"><button class="button-danger">Delete</button></a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular-grey">Counsellors</p>
                    <div>
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <!-- <th>Counselor ID</th> -->
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
                                    <!-- <td><?php echo $counselor->coun_id?></td> -->
                                    <td><?php echo $counselor->user_id?></td>
                                    <td><?php echo $counselor->coun_type?></td>
                                    <td><?php echo $counselor->first_name?></td>
                                    <td><?php echo $counselor->last_name?></td>
                                    <td><?php echo $counselor->username?></td>
                                    <td>
                                        <div class="btn-container-2">
                                            <div class="btn-container">
                                                <form action="" method="POST">
                                                    <button class="button-main">Edit</button>
                                                </form>
                                            </div>

                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT;?>Users/deleteCoun/<?php echo $counselor->user_id;?>" style="text-decoration: none;"><button class="button-danger">Delete</button></a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-white">
                    <p class="p-regular-grey">Doctors</p>
                    <div>
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
                                    <td><?php echo $doctor->user_id?></td>
                                    <td><?php echo $doctor->first_name?></td>
                                    <td><?php echo $doctor->last_name?></td>
                                    <td><?php echo $doctor->username?></td>
                                    <td><?php echo $doctor->hospital?></td>
                                    <td>
                                        <div class="btn-container-2">
                                            <div class="btn-container">
                                                <form action="" method="POST">
                                                    <button class="button-main">Edit</button>
                                                </form>
                                            </div>

                                            <div class="btn-container">
                                                <a href="<?php echo URLROOT;?>Users/deleteDoc/<?php echo $doctor->user_id;?>" style="text-decoration: none;"><button class="button-danger">Delete</button></a>
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
</body>
</html>