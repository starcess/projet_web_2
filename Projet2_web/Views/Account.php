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
    <link rel="stylesheet" href="./Css/account.css">
    <title>Document</title>
    <?php include('navigation.php'); ?>
    <?php include('footer_nav.php'); ?>
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
                <form action="/projet_web_2/Projet2_web/updatePassword" method="POST" id="profile-form">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" readonly required><br>

                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" readonly required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" readonly required><br>

                    <label for="new_password">Nouveau mot de passe :</label>
                    <div class="password_form">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                        <input type="password" id="new_password" name="password" required><br>
                        <button type="submit" class="update-button" name="updatePassword">Modifier mot de passe</button>
                    </div>

                    <button type="button" class="logout-button" onclick="logTheUserOut()">Déconnexion</button>

                </form>

            </div>
        </div>

    </div>

</body>



<script>
    function logTheUserOut() {
        const url = '/projet_web_2/Projet2_web/logout';
        // echo "URI : " . $uri . "<br>";
        // echo "Méthode : " . $method . "<br>";
        // console.log("hi");
        fetch(url)
            .then(response => {
                if (response.status !== 200) {
                    console.log('Error: Non-200 status code');
                    return [];
                }
                // console.log(response.json())
                return response.url;
            }).then(data => {
                window.location.href = data;
            })
            .catch(error => console.log(error));
    }

</script>



<script>
    const url = '/projet_web_2/Projet2_web/getUserInfo';
    // echo "URI : " . $uri . "<br>";
    // echo "Méthode : " . $method . "<br>";
    // console.log("hi");
    fetch(url)
        .then(response => {
            if (response.status !== 200) {
                console.log('Error: Non-200 status code');
                return [];
            }
            // console.log(response.json())
            return response.json();
        }).then(data => {
            let nomInput = document.getElementById('nom');
            let prenomInput = document.getElementById('prenom');
            let emailInput = document.getElementById('email');

            nomInput.value = data.Nom;
            prenomInput.value = data.Prenom;
            emailInput.value = data.Courriel;
            console.log(nomInput)
            console.log(prenomInput)
            console.log(emailInput)
        })
        .catch(error => console.log(error));

</script>

</html>