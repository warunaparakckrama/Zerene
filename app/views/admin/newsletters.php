<!-- <html> -->
<?php $currentPage = 'newsletters'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section class="sec-1">
            <div>
                <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
            </div>
            <div class="grid-1">  
                
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Newsletters</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular-grey">Sent Newsletters</p>
                        <div>
                            <table class="table-1">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>User type</th>
                                        <th>Content</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>System Update</td>
                                        <td>All Users</td>
                                        <td><p>Dear Users, There will be a system upgrade at 00.00hrs.</p></td>
                                        <td>
                                            <div class="btn-container">
                                                <div class="btn-container">
                                                    <a href="" style="text-decoration: none;"><button class="button-main">View</button></a>
                                                </div>

                                                <div class="btn-container">
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
                        <p class="p-regular-grey">Create New</p>
                        <div class="card-green">
                            <form action="">
                                <div style="font-size: 15px;">
                                    <label for="subject">Subject: </label>
                                    <input type="text" name="subject" placeholder="Enter your subject here" style="font-size: 15px;">
                                    <br><br>

                                    <label for="user_type">User Type: </label>
                                    <select name="user_type" id="user_type">
                                        <option value="All Users" >All Users</option>
                                        <option value="Administrators" >Administrators</option>
                                        <option value="Undergraduates" >Undergraduates</option>
                                        <option value="Counsellors" >Counsellors</option>
                                        <option value="Psychiatrists" >Psychiatrists</option>
                                    </select><br>
                                    
                                    <label for="content">Content: </label>
                                    <textarea name="content" id="content" cols="50" rows="2" placeholder="Enter your message here" style="font-family: Poppins, sans-serif;"></textarea>
                                    <p></p><br>

                                    <button class="button-main" type="submit">Send</button>
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