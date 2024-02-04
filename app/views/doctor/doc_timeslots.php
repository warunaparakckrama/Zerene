<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'doc_timeslots'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
</head>
<body>
    <section class='sec-1'>
    <div>
    <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
    </div> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Time slots</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Create New </p>
                        <div class="sub-container7">
                            <div>
                                <form action="/action_page.php" methord="post">
                                    <label for="slot_date" style="color:grey;">Date : </label>
                                    <input type="date" id="Date" name="slot_date" class="dropbtn">
                                    <label for="slot_time" style="color:grey;">Time : </label>
                                    <input type="Time" id="Time" name="slot_time" class="dropbtn">
                                    <select name="slot_type" class="dropbtn">
                                        <option value="physical" <?echo($data['slot_type']=== 'online')? 'selected': ''; ?> >Online</option>
                                        <option value="online" <?echo($data['slot_type']=== 'Physical')? 'selected': ''; ?> >Physical</option>       
                                    </select>             
                                </form>
                            </div>
                            <div class="subcontainer6">
                                <a href="<?php echo URLROOT;?>Admin/notifications_view/<?php echo $notifications->notification_id;?>" ><button class="button-main" type="submit">Create</button></a>
                                <button class="button-main" type="reset">Cancel</button>    
                                
                            </div>
                        </div>
                    
                </div><br>
                <div class="card-white">
                    <p class="p-regular">Available</p>
                </div>
            </div>
        </div>
        
    </section>
</body>
<!-- </html> -->