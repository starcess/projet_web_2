<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // print("RB_98 hasSessionDestroyed :" . session_destroy() . "<br>");
    // print("RB_97 hasSessionStarted :" . session_start() . "<br>");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up and Login</title>
</head>

<style>
    .form-container {
        width: 300px;
        margin: 0 auto;
        text-align: center;
    }

    #signup-form,
    #login-form {
        display: none;
    }
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

<body>
    <h1>Welcome to Our Website</h1>
    <div class="form-container">
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
            <input type="submit" name="Login" value="Login">
        </form>
    </div>
</body>

</html>