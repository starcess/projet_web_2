<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./Css/filterNav.css"> -->
    <title>Message</title>
</head>

<body>

    <?php include('header.php'); ?>

    <div id="message_container">
        <?php
        if (isset($_GET['message']) && $_GET['message'] === 'already_subscribed') {
            echo '<p>You are already subscribed.</p>';
        }
        ?>
    </div>


</body>

</html>