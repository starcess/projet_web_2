<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/login_styles.css">
    <title>Login</title>
</head>

<body>
    <?php include('navigation.php'); ?>

    <div class="body_box">
        <div class="form-popup" id="myForm">

            <div id="showLoginOrSignupButton">
                <button class="showSignup" onclick="showSignUpForm()">Sign Up</button>
                <button class="showLogin" onclick="showLoginForm()">Login</button>
            </div>

            <form id="signup-form" action="/projet_web_2/Projet2_web/signup" method="POST" style="display: none;">
                <h2>Sign Up</h2>

                <label for="signup_nom">Nom:</label>
                <input id="signup_nom" name="nom" required><br><br>

                <label for="signup_prenom">Prenom:</label>
                <input id="signup_prenom" name="prenom" required><br><br>

                <label for="signup_email">Email:</label>
                <input id="signup_email" name="email" type="email" required><br><br>

                <label for="signup_password">Password:</label>
                <input id="signup_password" name="password" type="password" required><br><br>

                <button class="signup_button" type="submit" name="signup">SignUp</button>
                <button class="close_button" type="button" onclick="showLoginOrSignupButton()">close</button>
            </form>

            <form id="login-form" action="/projet_web_2/Projet2_web/login" method="POST">
                <h2>Login</h2>
                <!-- Other fields -->
                <label for="login_email">Email:</label>
                <input id="login_email" name="email" type="email" required><br><br>

                <label for="login_password">Password:</label>
                <input id="login_password" name="password" type="password" required><br><br>

                <button class="login_button" type="submit" name="login">Login</button>
                <button class="close_button" type="button"  onclick="showLoginOrSignupButton()">close</button>
            </form>
        </div>
    </div>

    <script>
        function showSignUpForm() {
            document.getElementById("signup-form").style.display = "block";
            document.getElementById("login-form").style.display = "none";
            document.getElementById("showLoginOrSignupButton").style.display = "none";
        }

        function showLoginForm() {
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
            document.getElementById("showLoginOrSignupButton").style.display = "none";
        }

        function showLoginOrSignupButton(){
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "none";
            document.getElementById("showLoginOrSignupButton").style.display = "block";
        }
    </script>
</body>

</html>