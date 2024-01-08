<!-- <html> -->
<?php $currentPage = 'notifications'; ?>
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
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Notifications</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular-grey">Current Notifications</p>
                        <div>
                            <table class="table-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Subject</th>
                                        <th>User Type</th>
                                        <th>Content</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($data['notifications'] as $notifications) : ?>
                                        <tr>
                                            <td><?php echo $notifications->notification_id?></td>
                                            <td><?php echo $notifications->author?></td>
                                            <td><?php echo $notifications->subject?></td>
                                            <td><?php echo $notifications->user_type?></td>
                                            <td><?php echo $notifications->content?></td>
                                            <td>
                                                <div class="btn-container-2">
                                                    <div class="btn-container">
                                                        <a href="" style="text-decoration: none;"><button class="button-main">Edit</button></a>
                                                    </div>

                                                    <div class="btn-container">
                                                        <a href="" style="text-decoration: none;"><button class="button-danger" onclick="confirmDelete(event)">Delete</button></a>
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
                        <p class="p-regular-grey">Create Notifications</p>
                        <div class="card-green">
                            <form action="<?php echo URLROOT;?>admin/notifications/<?php echo $user_id=$_SESSION['user_id'];?>" method="POST">
                                <div style="font-size: 15px;">
                                    <label for="subject">Subject: </label>
                                    <input type="text" name="subject" placeholder="Enter your subject here" style="font-size: 15px;">
                                    <br><br>

                                    <label for="user_type">User Type: </label>
                                    <select name="user_type">
                                        <option value="all users" <?php echo ($data['user_type'] === 'all users') ? 'selected' : ''; ?> >All Users</option>
                                        <option value="admin" <?php echo ($data['user_type'] === 'admin') ? 'selected' : ''; ?> >Administrators</option>
                                        <option value="undergrad" <?php echo ($data['user_type'] === 'undergrad') ? 'selected' : ''; ?> >Undergraduates</option>
                                        <option value="academic" <?php echo ($data['user_type'] === 'academic') ? 'selected' : ''; ?> >Counsellors (Academic)</option>
                                        <option value="professional" <?php echo ($data['user_type'] === 'professional') ? 'selected' : ''; ?> >Counsellors (Professional)</option>
                                        <option value="doctors" <?php echo ($data['user_type'] === 'doctor') ? 'selected' : ''; ?> >Psychiatrists</option>
                                    </select><br>
                                    
                                    <label for="content">Content: </label>
                                    <textarea name="content" id="content" cols="50" rows="2" placeholder="Enter your message here" style="font-family: Poppins, sans-serif;"></textarea>
                                    <p></p><br>

                                    <button class="button-main" type="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </body>
<!-- </html> -->