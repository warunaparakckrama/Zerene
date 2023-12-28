<!-- <!DOCTYPE html>
<html lang="en"> -->
    <?php $currentPage = 'ac_timeslots'; ?>
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
        <?php require APPROOT . '/views/inc/sidebar-ac.php'; ?>
        </div> 
        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Questionnaires</p></div>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Create New </p>
                        <div class="sub-container7">
                            <div>
                                <form action="/action_page.php">
                                    <label for="Date" style="color:grey;">Date : </label>
                                    <input type="date" id="Date" name="date" class="dropbtn">
                                    <label for="time" style="color:grey;">Time : </label>
                                    <input type="Time" id="Time" name="time" class="dropbtn">
                                    <select id="timeslotm" class="dropbtn">
                                        <option value="physical">Physical</option>
                                        <option value="online">Online</option>       
                                    </select>             
                                </form>
                            </div>
                            <div class="subcontainer6">
                                <button class="button-main">
                                    Create
                                </button>
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