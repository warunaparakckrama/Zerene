<?php 
    $currentPage = 'doc_prescription';
    $undergrad = $data['undergrad'];
    $doctor = $data['doctor'];
    $ug_user_id = $data['ug_user_id'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Prescription</title>
</head>

<body>
    <section class='sec-1'>
        <div>
            <?php require APPROOT . '/views/inc/sidebar-doc.php'; ?>
        </div>

        <div class="grid-1">
            <div class="subgrid-1">
                <div class="subgrid-2"><p class="p-title" style="font-size: 40px;">Prescription</p></div>
            </div>

            <div>
                <p class="p-regular-green">Create Prescription</p>
                <form class="" action="<?php echo URLROOT; ?>Doctor/addPrescription/<?php echo $_SESSION['user_id']; ?>" method="POST">
                    <div class="card-white" style="font-size: 15px;">
                        <div id="input-container" class="card-green-2">
                            <input type="hidden" name="ug_user_id" value="<?php echo $ug_user_id;?>">

                            <label for="ug_name">Patient's Name:</label>
                            <input type="text" name="ug_name" class="input" style="width: 50%;" required>

                            <label for="age">Patient's Age :</label>
                            <input type="hidden" name="age" value="<?php echo $undergrad->age;?>">
                            <p class="p-regular-green"><?php echo $undergrad->age;?></p>

                            <label for="gender">Patient's Gender:</label>
                            <input type="hidden" name="gender" value="<?php echo $undergrad->gender;?>">
                            <p class="p-regular-green"><?php echo $undergrad->gender;?></p>

                            <label for="diagnosed_with">Diagnosed with :</label>
                            <input type="text" name="diagnosed_with" class="input" style="width: 50%;" required>

                            <label for="diagnosed_by">Diagnosed By :</label>
                            <input type="hidden" name="diagnosed_by" value="<?php echo $doctor->first_name.' '.$doctor->last_name;?>">
                            <p class="p-regular-green">Dr. <?php echo $doctor->first_name.' '.$doctor->last_name;?></p>

                            <label for="pres_date">Date :</label>
                            <p class="p-regular-green"><?php echo date('d-m-Y');?></p>

                        </div>
                    </div>

                    <div class="card-white-scroll"  style="font-size: 15px; height: 240px;">
                        <p class="p-regular-green">Medicine Description</p>
                        <div id="medicine-container">
                            <div id="medicine-row" class="card-green-2">
                                <label for="drug">Drug Name:</label>
                                <input type="text" name="drug[]" class="input" style="width: 50%;" required>

                                <label for="unit">Quantity:</label>
                                <div>
                                    <input type="number" min="0" name="unit[]" class="input-prescription"  style="width: 25%;">
                                    <select name="unit_type[]" class="option">
                                        <option value="Tablets" selected>Tablets</option>
                                        <option value="Mililliters">Milliliters</option>
                                    </select>
                                </div>

                                <label for="dosage">Dosage (per day):</label>
                                <div>
                                    <input type="number" min="1" name="dosage[]" class="input-prescription"  style="width: 25%;">
                                    <select name="dosage_type[]" class="option">
                                        <option value="Tablets" selected>Tablets</option>
                                        <option value="Tablespoons">Tablespoons</option>
                                    </select>
                                </div>
                                <label for="Instructions">Instructions:</label>
                                <input type="text" name="instructions[]" class="input" style="width: 50%;" required>



                                <button class="button-danger" type="button" onclick="removeMedicineRow(this)">Remove</button>
                            </div>
                        </div>

                        <!-- "Add Row" button -->
                        <button  class="button-main" type="button" onclick="addMedicineRow()">Add Row</button>
                    </div>

                    <div style="display: flex; flex-direction: row; gap: 10px;">
                        <button class="button-main" type="submit">Create Prescription</button>
                        <button class="button-danger" type="reset">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
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
            // Get the parent div of the button (which is the medicine row)
            var row = button.parentNode;

            // Count the number of medicine rows
            var rowCount = document.querySelectorAll('#medicine-container > .card-green-2').length;

            // Check if there is more than one row
            if (rowCount > 1) {
                // If there is more than one row, remove it
                row.parentNode.removeChild(row);
            }
        }
    </script>
</body>