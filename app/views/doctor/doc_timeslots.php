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
                                <form action="<?php echo URLROOT;?>doctor/addTimeslots/<?php echo $user_id=$_SESSION['user_id'];?>"methord="post">
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
                                <button class="button-main" type="submit">Create</button>
                                <button class="button-main" type="reset">Cancel</button>    
                                
                            </div>
                        </div>
                    
                </div><br>

               <div class="card-white">
                    <p class="p-regular">Created</p>
                    <?php
                    // Grouping timeslots by date
                    $groupedTimeslots = [];
                    foreach ($data['timeslot'] as $timeslot) {
                        $date = date('l', strtotime($timeslot->slot_date)); // Get the day name (e.g., Monday)
                        $formattedDate = date('Y-m-d', strtotime($timeslot->slot_date));
                        $start_time = date('h:ia', strtotime($timeslot->slot_start));
                        $end_time = date('h:ia', strtotime($timeslot->slot_finish));
                        $formattedTimeRange = "$start_time - $end_time";
                        // $time = date('h:ia', strtotime($timeslot->slot_time));
                        $groupedTimeslots[$formattedDate][$date][] = $formattedTimeRange;
                    }

                    // Displaying grouped timeslots
                    foreach ($groupedTimeslots as $formattedDate => $days) {
                        echo "<div class='card-green-2'>";
                        foreach ($days as $day => $timeRanges) {
                            echo "<div>";
                            echo "<p class='p-regular-grey' style='font-size: 20px;'>$day</p>";
                            echo "<p class='p-regular-grey' style='font-size: 15px;'>$formattedDate</p>";
                            echo "</div>";
                            echo "<div class='btn-container-2'>";
                            foreach ($timeRanges as $timeRange) {
                                echo "<button class='button-main'>$timeRange</button>";
                            }
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>

                <div class="card-white">
                    <p class="p-regular">Reserved</p>
                    <div class="card-green-2">
                        <div>
                            <p class="p-regular-grey" style="font-size: 20px;">Monday</p>
                            <p class="p-regular-grey" style="font-size: 15px;">2024-01-29</p>
                        </div>
                        <div class="btn-container-2">
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                            <button class="button-second">2.00-2.30pm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>