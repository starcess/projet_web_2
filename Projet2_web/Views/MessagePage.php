<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/MessagePage_styles.css">
    <title>Message</title>
</head>

<body>

    <?php include('header.php'); ?>

    <div  id="message_container">
        <?php
        if (isset($_GET['message'])) {
            echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
        }
        ?>
    </div>


</body>

</html>