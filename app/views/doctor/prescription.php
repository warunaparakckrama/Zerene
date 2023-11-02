<!DOCTYPE html>
<html lang="en">
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
        <section>

            <div class="grid-1">
                <div class="subgrid-1">
                    <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Prescription</p></div>
                    <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php';?></div>
                </div>

                <div>
                    <div class="card-white">
                        <p class="p-regular"></p>
                        
                        <div class="card-green-3">
                        <div>
                        <form class="form-inline" action="/action_page.php">
                        <label for="email">Name:</label>
                        <input type="text" id="email" placeholder="undergraduate name" name="email">
                        <label for="pwd">ID:</label>
                        <input type="text" id="pwd" placeholder="undergraduate id" name="pswd">
                        <label for="pwd">date:</label>
                        <input type="text" id="date" placeholder="date" name="date">
                        <div class="btn-container">
                                <button class="button-main">Add</button>
                            </div>
                        </form>
                        
                        </div>
                        </div>
                    </div>    
    
                    <div class="card-white">
                    <p class="p-regular"></p>
                        
                    <dev class="card-green-3">
                    <form class="form-inline" action="/action_page.php">
                        <label for="email">medicine:</label>
                        <input type="text" id="medicine" placeholder="name of medicine" name="medicine">
                        <label for="pwd">amount(mg):</label>
                        <input type="text" id="amount" placeholder="amount in mg" name="amount">
                        <label for="pwd">time:</label>
                        <input type="text" id="time" placeholder="morning/day/night" name="time">
                        <div class="btn-container">
                                <button class="button-main">Add</button>
                            </div>
                        </form>

                   

                   </div>
                 <div class="card-white">
                        <p class="p-regular"></p>
                        
                        <div class="card-green-3">
                        <div>
                        <table>
                           <tr>
                           <th>medicine</th>
                           <th>dose</th>
                           <th>time</th>
                           <th></th>
                           <th></th>
                           </tr>
                           <tr>
                           <td>abc</td>
                           <td>50mg</td>
                           <td>night</td>
                           <td><button class="button-main">edit</button></td>
                           <td><button class="button-main">delete</button></td>
                           </tr>
                           <tr>
                           <td>pqr</td>
                           <td>20mg</td>
                           <td>day and night</td>
                           <td><button class="button-main">edit</button></td>
                           <td><button class="button-main">delete</button></td>
                          </tr>

                        </table>
                        


                        </div>
                        </div>
                    </div>    
               

                 </div>
            </div>    

        </section>
    </body>
</html>