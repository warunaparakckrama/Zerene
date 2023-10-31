<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./acad-counsellor.css">
    <title>actimeslot</title>
</head>
<body>
    <section>

        <div class="grid-container2">
            <div class="sub-container4">
                <div class="sub-container5">
                    <p class="p-title" style="font-size: 40px;">Time Slots</p>
                </div>
                <div class="sub-container6" style="gap: 50px;">
                    <button class="notify">
                        <img src="../images/search.svg" alt="search" width="25" height="25">
                    </button>
                    <button class="notify">
                        <img src="../images/bell.svg" alt="bell" width="25" height="25">
                    </button>
                </div>
            </div>
            <div class="sub-container5">
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
</html>