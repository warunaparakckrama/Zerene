<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section class="sec-1">
        <div>
        <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Add Note</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>
            
            <div>
                <div class="card-white">
                <p class="p-regular">Add Note</p>
                <div class="card-green">
                    <img src="<?php echo IMG;?>pro-avatar1.svg" alt="pro pic" class="card-profile">
                    <div>
                        <p class="p-regular" style="margin-bottom:0px ;"><?php echo $data['ug_name'] ?></p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">University of Colombo School of Computing</p>
                        <p class="p-regular" style="color:var(--zerene-grey) ;">3 notes</p>
                    </div>
                    
                </div>
                
                    <div>
                        <form  method="POST" action="<?php echo URLROOT; ?>academic/ac_undergraduate4/<?php echo $data['ug_id']?>">
                        <input type="text" value="<?php echo $data['subject']?>" name="subject" placeholder="Subject" class="card-green">
                        <p class="p-error"><?php echo isset($data['subject_err']) ? $data['subject_err'] : ''; ?></p>
                        <textarea id="w3review" name="body" rows="20" cols="140" placeholder="Add your text here" class="card-green"><?php echo $data['body']?></textarea>
                        <p class="p-error"><?php echo isset($data['body_err']) ? $data['body_err'] : ''; ?></p>
                        <div>
                            <input type="submit" value="Submit" class="button-main" >

                        </div>

        
                        </form>
                    </div>
                </div>
                
                
            </div>

        </div>

        
    </div>
    </section>

    
</body>
</html>