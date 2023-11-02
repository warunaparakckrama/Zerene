<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
<!-- </head>
<body>
    <section> -->
        <div class="grid-1">
            <div class="subgrid-1">
                <a href="<?php echo URLROOT ?>procounsellor/dashboard">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Timeslots</p></div></a>
                <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
            </div>

            <div>
                <div class="card-white">
                    <p class="p-regular">Create New Time Slot</p>
                        <div class="sub-container7">
                            <div>
                                <form action="<?php echo URLROOT ?>/Timeslot/timeslotCreate" method="POST">
                                    <div class="form-container" style="display: flex; justify-content: space-between">
                                        <div class="date-time1">
                                            <label for="Date" style="color:grey;">Date : </label>
                                            <input type="date" id="Date" name="date" class="dropbtn">
                                        </div>
                                        <div class="date-time2">
                                            <label for="time" style="color:grey; align-items:center;" >Time : </label>
                                            <input type="Time" id="Time" name="time" class="dropbtn">
                                        </div>
                                        <select id="timeslotm" class="dropbtn" name="place">
                                            <option value="physical">Physical</option>
                                            <option value="online">Online</option>       
                                        </select>
                                        <select id="slotuser" class="dropbtn" name="u_id">
                                            <option value="Professional counsellor">Professional counsellor</option>
                                            <option value="Academic counsellor" >Academic counsellor</option>
                                            <option value="Doctor">Doctor</option>        
                                        </select>              
                                        <button class="button-main" id="button-main">Create</button>
                                    </div>
                                </form>
                            </div>
                            <div class="subcontainer6">
                            </div>
                        </div>
                    
                </div>
                <br>
                <div class="card-white">
                    <?php
                    
                    if (sizeof($data) < 2){ ?>
                        <div class="p-regular">No Available Timeslots</div><br>
                    <?php }                   
                    

                    else {?>
                    <div class="p-regular">Available Timeslots</div>
                    <br>
                    <table border="2" style="justify-content: space-between; width: 100%;">
                        <tr class="p-regular" style="text-align: center; font-weight: bold">
                            <td>Date</td>
                            <td>Time</td>
                            <td>Place</td>
                            <td>Delete the Timeslot</td>
                        </tr>                        
                        <?php for ($i = 0; $i < sizeof($data); $i++) {?>
                            <tr style="text-align:center">
                                <td>
                                    <?php echo $data[$i]->slot_date ?>
                                </td>
                                <td>
                                    <?php echo $data[$i]->slot_time ?>
                                </td>
                                <td>
                                    <?php echo $data[$i]->slot_type ?>
                                </td>
                                <td>
                                <div class="btn-container">
                                    <form action="<?php echo URLROOT ?>Timeslot/timeslotDelete" method="POST">
                                        <input type="text" value="<?php echo $data[0]->slot_id?>" name="slot_id" hidden>
                                        <input type="submit" class="button-main" value="Delete"/>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                    <?php }?>
                </div>
            </div>
        </div>
    <!-- </section>
</body>
</html> -->