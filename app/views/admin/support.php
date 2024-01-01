<!-- <html> -->
<?php $currentPage = 'support'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <title><?php echo SITENAME;?> | Support</title>
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
                        <p class="p-regular-grey">Complaints</p>
                        <div>
                            <table class="table-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User type</th>
                                        <th>Email</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Ryan Gosling</td>
                                        <td>Undergraduate</td>
                                        <td>goslingr@stu.ucsc.cmb.ac.lk</td>
                                        <td>Login issue</td>
                                        <td>unresolved</td>
                                        <td>
                                            <div class="btn-container">
                                                <div class="btn-container">
                                                    <a href="" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                    <a href="" style="text-decoration: none;"><button class="button-main">Resolve</button></a>
                                                    <a href="" style="text-decoration: none;"><button class="button-danger">Remove</button></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-white">
                        <p class="p-regular-grey">Feedback</p>
                        <div>
                            <table class="table-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User type</th>
                                        <th>Email</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Ryan Gosling</td>
                                        <td>Undergraduate</td>
                                        <td>goslingr@stu.ucsc.cmb.ac.lk</td>
                                        <td>Login issue</td>
                                        <td>unresolved</td>
                                        <td>
                                            <div class="btn-container">
                                                <div class="btn-container">
                                                    <a href="" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                    <a href="" style="text-decoration: none;"><button class="button-main">Resolve</button></a>
                                                    <a href="" style="text-decoration: none;"><button class="button-danger">Remove</button></a>
                                                </div>
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
<!-- </html> -->