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
                <div class="card-white">
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
                </div>

                <div class="card-white">
                    <p class="p-regular-grey">Counsellors</p>
                    <div>
                        <table class="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Academic</td>
                                    <td>Ken</td>
                                    <td>Adams</td>
                                    <td>zereneac1</td>
                                    <td>
                                        <div class="btn-container-2">
                                            <button class="button-main">View</button>
                                            <button class="button-main">Edit</button>
                                            <button class="button-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
</html>