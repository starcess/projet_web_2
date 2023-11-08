<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/login_styles.css">
    <title>Login</title>
</head>

<body>
    <!-- A button to open the popup form -->
    <!-- <button class="open-button" onclick="openForm()">Open Form</button> -->

    <!-- The form -->
    <?php include('navigation.php'); ?>

    <div class="body_box">
        <div class="form-popup" id="myForm">
            <button onclick="showSignUpForm()">Sign Up</button>
            <button onclick="showLoginForm()">Login</button>

            <form id="signup-form" action="./api/signup" method="POST">
                <h2>Sign Up</h2>
                <label for="nom">Nom:</label>
                <input id="nom" name="nom" required><br><br>

                <label for="prenom">Prenom:</label>
                <input id="prenom" name="prenom" required><br><br>

                <label for="signup-email">Email:</label>
                <input id="signup-email" name="email" required><br><br>

                <label for="signup-password">mot_de_passe:</label>
                <input id="signup-password" name="mot_de_passe" required><br><br>
                <!-- <input type="password" id="signup-password" name="mot_de_passe" required><br><br> -->
                <input type="submit" name="SignUp" value="SignUp">
            </form>

            <form id="login-form" action="./api/login" method="POST">
                <h2>Login</h2>
                <label for="email">Email:</label>
                <input id="login-email" name="email" required><br><br>

                <label for="mot_de_passe">mot_de_passe:</label>
                <input id="signup-password" name="mot_de_passe" required><br><br>
                <!-- <input type="password" id="login-password" name="mot_de_passe" required><br><br> -->
                <button type="submit" name="Login" value="Login">
            </form>
        </div>

    </div>



    <style>
     
    </style>


    <script>
        function showSignUpForm() {
            document.getElementById("signup-form").style.display = "block";
            document.getElementById("login-form").style.display = "none";
        }

        function showLoginForm() {
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
        }
    </script>
</body>

</html>