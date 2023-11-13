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
    <link rel="stylesheet" href="./Css/foot_styles.css">
    <title>Footer</title>
</head>

<footer>


    <div class="footbar">

        <div class="foot-links">
            <div class="logo">
                <a href="javascript:getAccueil();"><img class="logo_image" src="../Ressource/Images/logo_4.png"
                        alt="Logo"></a>
            </div>

            <ul class="menu-footer">
                <li>
                    <div class="footLink">
                        <a class="footLink_home" href="javascript:getAccueil();">Accueil</a>
                    </div>
                </li>
                <li>
                    <div class="footLink">
                        <a class="footLink_Magasin" href="javascript:getMagasin();">Magasin</a>
                    </div>
                </li>

                <li>
                    <div class="footLink">
                        <a class="footLink_account" href="javascript:getAccount();">Page Profile</a>
                    </div>
                </li>
                <li>
                    <div class="footLink">
                        <a class="footLink_infolettre" href="javascript:getInfolettre();">Infolettre</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <script>

        function getAccueil() {
            const url = '/projet_web_2/Projet2_web/Acceuil';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }

                    return response.url;
                }).then((data) => {

                    window.location.href = data;

                }).catch(error => {
                    console.error('Fetch error:', error);
                });
        }

        function getMagasin() {
            const url = '/projet_web_2/Projet2_web/Magasin';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }

                    return response.url;
                }).then((data) => {


                    window.location.href = data;

                }).catch(error => {
                    console.error('Fetch error:', error);
                });
        }


        function getAccount() {
            const url = '/projet_web_2/Projet2_web/Account';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    console.log(response.url)
                    return response.url;
                }).then((data) => {

                }).catch(error => {
                    console.error('Fetch error:', error);
                });

        }



        function getInfolettre() {
            const url = '/projet_web_2/Projet2_web/Infolettre';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }

                    return response.url;
                }).then((data) => {



                    window.location.href = data;

                }).catch(error => {
                    console.error('Fetch error:', error);
                });
        }





    </script>

</footer>

</html>