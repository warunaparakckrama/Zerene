<!DOCTYPE html>
<?php $currernt_page = 'ac_feedback'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME;?> | Feedback</title>

</head>
<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div>
        <div class="grid-1">
            <div class="subgrid-1">
                <p class="p-title" style="font-size: 40px;">Feedback</p>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                    <div class="card-white">
                        <p class="p-regular">Submit Feedback/ Complaints</p>

                        <div class="card-green">
                            <form action="<?php echo URLROOT;?>Academic/sentFeedback/<?php echo $_SESSION['user_id'];?>" method="POST">
                                <div style="font-size: 15px;">

                                    <label for="type">Type: </label>
                                    <select name="type">
                                        <option value="feedback">Feedback</option>
                                        <option value="complaint">Complaint</option>
                                    </select><br>

                                    <label for="title">Title: </label>
                                    <input type="text" name="title" class="" value=""><br>

                                    <label for="content">Content: </label>
                                    <textarea name="content" id="" cols="30" rows="10" style="margin-bottom: 10px;" placeholder="Enter your concern here..."></textarea>

                                    <div class="btn-container-2">
                                        <a href="" style="text-decoration: none;"><button class="button-main" type="submit">Submit</button></a>
                                        <a href="" style="text-decoration: none;"><button class="button-danger" type="reset">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

        </div>
    </section>
    
</body>
</html>