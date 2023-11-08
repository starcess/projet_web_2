<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/account.css">
    <title>Document</title>
    <?php include('navigation.php'); ?>
</head>

<body>

    <div class="body_container">
        <div class="container">
            <div class="box">
                <img src="assets/rdj.jpeg" alt="">
                <!-- <ul>
                <li>Robert Downey Jr.</li>
                <li>50 years</li>
                <li>Actor</li>
                <li><i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                    <i style="font-size:24px" class="fa"></i>
                </li>
            </ul> -->
            </div>
            <div class="About">
                <form action="#" method="post" id="profile-form">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" placeholder="Doe" required><br>

                    <label for="prenom">Prenom:</label>
                    <input type="text" id="prenom" name="prenom" placeholder="John" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="a@a" required><br>

                    <label for="new_password">New Password:</label>
                    <div class="password_form">
                        <input type="password" id="new_password" name="new_password" required><br>
                        <button type="submit" class="update-button">Update Password</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>