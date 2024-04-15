<?php $currentPage = 'prescription'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        

        input-row {
            margin-bottom: 10px;
            /* Adjust as needed for spacing between rows */
        }

        .full-width {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <section class='sec-1'>
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
            <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
            <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">

        </head>

        <body>
            <section>

                <div class="grid-1">
                    <div class="subgrid-1">
                        <div class="subgrid-2">
                            <p class="p-title" style="font-size: 40px;">Prescription</p>
                        </div>
                        <div class="subgrid-3"><?php require APPROOT . '/views/inc/searchbar.php'; ?></div>
                    </div>

                    <div>
                    <form class="form-inline" action="<?php echo URLROOT; ?>Doctor/addMedicine/<?php echo $user_id = $_SESSION['user_id']; ?>" method="POST">
                        <div class="card-white">
                           
                            <div id="input-container" class="card-green-2">
                               
                                
                                    <label for="ug_name">Full Name :</label>
                                    <input type="text" id="ug_name" name="ug_name" class="full-width">

                                    <label for="age">Age :</label>
                                    <input type="number" id="age" name="age" class="full-width">

                                    <label for="gender">Gender:</label>
                                    <select name="gender" class="full-width">
                                        <option value="male" <?php echo ($data['gender'] === 'male') ? 'selected' : ''; ?>>male</option>
                                        <option value="female" <?php echo ($data['gender'] === 'female') ? 'selected' : ''; ?>>female</option>
                                    </select>

                                    <label for="diagnosis_with">Diagnosis with :</label>
                                    <input type="text" id="diagnosis_with" name="diagnosis_with" class="full-width">
                                    <div class="btn-container">
                                   
                                
                                
                            </div>
                            </div>
                        </div>




                        <div class="card-white">
                            <p class="p-regular">Add medicine</p>

                            
                            <div id="medicine-container">
                                
                                <div id="medicine-row" class="card-green-2">
                                    <label for="drug">Drug:</label>
                                    <input type="text" name="drug[]" class="medicine-input">

                                    <label for="unit">Unit:</label>
                                    <input type="number" name="unit[]" class="unit-input">

                                    <label for="dosage">Dosage:</label>
                                    <input type="number" name="dosage[]" class="dosage-input">

                                    <button type="button" onclick="removeMedicineRow(this)">Remove</button>
                                </div>
                            </div>

                            <!-- "Add Row" button -->
                            <button type="button" onclick="addMedicineRow()">Add Row</button>

                            <!-- Your existing form for adding medicine -->
                            
                                <!-- Existing medicine input fields go here -->

                              
                            
                        </div>

                        <div class="card-white">
                            <p class="p-regular"></p>
                            <div class=card-green-2>
                            
                                    <label for="pres_date">Date :</label>
                                    <input type="date" id="pres_date" name="pres_date" class="">

                                    <label for="created_by">Psychiatrist :</label>
                                    <input type="text" id="created_by" name="created_by" class="">  
                                    
                            </div>
                           
                        </div>
                        <button class="button-main" type="submit">submit</button>  
    </form>
            </section>

            <script>
                function addMedicineRow() {
                    // Clone the template row
                    var newRow = document.getElementById('medicine-container').appendChild(document.getElementById('medicine-row').cloneNode(true));

                    // Clear input values in the new row
                    var inputs = newRow.getElementsByTagName('input');
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].value = '';
                    }
                }

                function removeMedicineRow(button) {
                    // Get the parent div of the button (which is the medicine row) and remove it
                    var row = button.parentNode;
                    row.parentNode.removeChild(row);
                }
            </script>
        </body>
        <!-- </html> -->