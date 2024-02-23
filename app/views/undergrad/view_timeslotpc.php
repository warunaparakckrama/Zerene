<?php $currentPage = 'view_timeslotpc'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>main.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>dashboard.css">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.svg" type="image/x-icon">
    <title><?php echo SITENAME; ?> | Timeslots </title>
</head>

<body>
    <section class="sec-1">
        <div>
            <?php require APPROOT . '/views/inc/sidebar-ug.php'; ?>
        </div>

        <h2>Timeslots Available</h2>

        <?php if (!empty($data['timeslots'])) : ?>
            <?php foreach ($data['timeslots'] as $timeslot) : ?>
                <div class="timeslot-item">
                    <p>Date: <?php echo $timeslot->slot_date; ?></p>
                    <p>Time: <?php echo $timeslot->slot_start . ' - ' . $timeslot->slot_finish; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No timeslots available.</p>
        <?php endif; ?>

    </section>
</body>

</html>