<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
    </head>
    <body>
        <section>

            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Prescription</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular"></p>
                        
                        <div class="card-green">
                        <div>
                        <form action="/action_page.php">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        <br>

                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        <input type="submit" value="Submit">
                        </form>
                        </div>
                        </div>
                    </div>    
    
                        
                        
    
                    <div class="card-white">
                    <p class="p-regular"></p>
                        
                    <dev class="card-green">

                    <dev class="container">
                        <div class"row mt-5">
                            <div class"col-md-3">
                                <label for ="medecine">medecine</label>
                                <input type="text" class"form-control" id="medecine">
                            </div>
                            <div class"col-md-3">
                                <label for ="dose">dose   </label>
                                <input type="text" class"form-control" id="dose">
                            </div>
                            <div class"col-md-3">
                                <label for ="amount">amount(mg)</label>
                                <input type="text" class"form-control" id="amount(mg)">
                            </div>
                            <div class"col-md-3">
                                <label for ="time">time   </label>
                                <input type="text" class"form-control" id="time">
                            </div>
                        </div>
                    </dev>

                     
                        
                             
                            
                    </div>


                        </div>
                    
                </div>

            </div>

        </section>
    </body>
</html>