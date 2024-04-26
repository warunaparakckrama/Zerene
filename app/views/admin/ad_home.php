<?php
$currentPage = 'ad_home';
$usercount = $data['usercount'];
$facultycount = $data['facultycount'];
$facultynames = array_keys($facultycount);
$monthlycount = $data['monthlycount'];
$months = array_keys($monthlycount);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Administrator</title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ad.php'; ?>
        </div>
        <div class="grid-chart">

            <div class="subgrid-1">
                <div class="subgrid-2">
                    <p class="p-title" style="font-size: 40px;">Overview</p>
                </div>
            </div>
            <div class="subgrid-6">
                <div class="subgrid-7" style="gap: 10px;">
                    <div class="card-white">
                        <div class="card-green">
                            <canvas id="userCount" width="auto"></canvas>
                        </div>
                    </div>
                    <div class="card-white">
                        <div class="card-green">
                            <canvas id="facultycount" width="auto" height="143px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-white">
                    <div class="card-green">
                        <canvas id="monthlycount" width="max-content" height="50px"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS; ?>chart.js"></script>
    <script>
        //--user count chart--
        //setup block
        const usercount = <?php echo json_encode($usercount); ?>;
        const data = {
            labels: ['Undergraduate', 'Doctors', 'Professional Counsellors', 'Academic Counsellors', 'Pharmacies', 'Admins'],
            datasets: [{
                label: 'Number of Users',
                data: usercount,
                backgroundColor: zerenegreen,
                borderWidth: 1
            }]
        };
        //config block
        const config = {
            type: 'bar',
            data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Registrations',
                        font: {
                            size: 15,
                            family: 'Poppins',

                        }
                    }
                },

            }
        };
        //render block
        const myChart = new Chart(
            document.getElementById('userCount'),
            config
        );

        //--faculty count chart--
        //setup block
        const facultycount = <?php echo json_encode(array_values($facultycount)); ?>;
        const data2 = {
            labels: <?php echo json_encode($facultynames); ?>,
            datasets: [{
                label: 'Number of Undergraduates',
                data: facultycount,
                backgroundColor: zerenegreen,
                borderWidth: 1
            }]
        };

        //config block
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Faculty Count | Undergraduates',
                        font: {
                            size: 15,
                            family: 'Poppins',
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Start the axis at zero
                        // Customize the ticks
                        ticks: {
                            stepSize: 1, // Set the step size between ticks
                            callback: function(value, index, values) {
                                return value; // Customize the display of each tick value as needed
                            }
                        }
                    }
                }

            }
        };

        //render block
        const myChart2 = new Chart(
            document.getElementById('facultycount'),
            config2
        );

        //monthly count line chart
        //setup block
        const monthlycount = <?php echo json_encode(array_values($monthlycount)); ?>;
        const data3 = {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Number of Users',
                data: monthlycount,
                fill: false,
                borderColor: zerenegreen,
                tension: 0.1
            }]
        };

        //config block
        const config3 = {
            type: 'line',
            data: data3,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Registrations',
                        font: {
                            size: 15,
                            family: 'Poppins',
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Start the axis at zero
                        // Customize the ticks
                        ticks: {
                            stepSize: 1, // Set the step size between ticks
                            callback: function(value, index, values) {
                                return value; // Customize the display of each tick value as needed
                            }
                        }
                    }
                }
            }
        };

        //render block
        const myChart3 = new Chart(
            document.getElementById('monthlycount'),
            config3
        );
    </script>
</body>