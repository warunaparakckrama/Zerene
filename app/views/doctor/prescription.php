<!-- <!DOCTYPE html>
<html lang="en"> -->
<?php $currentPage = 'prescription'; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.svg" type="image/x-icon">
        <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    </head>
    <body>
        <section class='sec-1'>
        <div>
        <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Prescription</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                    
                        <p class="p-regular">undergraduate details</p>
                        
                        <div class="card-green-3">
                            <div>
                                <form class="form-inline" action="/action_page.php">
                                    <label for="name">Name of the patiant:</label>
                                    <input type="text" id="name" placeholder="name of the patiant" name="name">
                        
                                </form>
                        
                            </div>
                        </div>

                        <!-- <p class="p-regular"></p> -->
                        
                        <div class="card-green-3">
                            <div>

                            <form class="form-inline" action="/action_page.php">
                            <label for="drug">date of birth:</label>
                            <input type="text" id="birth" placeholder="bithday" name="date of birth">
                            <label for="amount">Age:</label>
                            <input type="number" id="amount" placeholder="age" name="age">
                            
                            
                            </form>
                            </div>
                        </div>

                        <div class="card-green-3">
                            <div>
                                <form class="form-inline" action="/action_page.php">
                                    <label for="name">contac details (mention complete contact details of the patiant):</label>
                                    <input type="text" id="name" placeholder="" name="name">
                        
                                </form>
                        
                            </div>
                        </div>

                        <div class="card-green-3">
                            <div>
                                <form class="form-inline" action="/action_page.php">
                                    <label for="name">diagnosed with :</label>
                                    <input type="text" id="name" placeholder="name of the illness that the patient is suffered with" name="name">
                        
                                </form>
                        
                            </div>
                        </div>

                    </div>    
    
                    
                   

                   

                   </div>
                   
               

                 </div>
            </div>    

        </section>
    </body>
<!-- </html> -->