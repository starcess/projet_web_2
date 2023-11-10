<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/nav_styles.css">
    <title>Neon Navbar</title>
</head>

<header>


    <div class="navbar">
        <div class="logo">
            <a href="javascript:getAccueil();"><img class="logo_image" src="../Ressource/Images/logo_4.png"
                    alt="Logo"></a>
        </div>
        <div class="nav-links">
            <div class="navLink">
                <a class="navLink_home" href="javascript:getAccueil();">Accueil</a>
            </div>
            <div class="navLink">
                <a class="navLink_Magasin" href="javascript:getMagasin();">Magasin</a>
            </div>
            <!-- <div class="navLink">
                <a class="navLink_contact" href="Contact.php">Contact</a>
            </div> -->
            <div class="navLink">
                <a class="navLink_account" href="javascript:getAccount();">Page Profile</a>
            </div>
            <div class="navLink">
                <a class="navLink_infolettre" href="javascript:getInfolettre();">Infolettre</a>
            </div>
            <div class="navLink">
                <a class="navLink_cart" href="">Panier</a>
            </div>
        </div>
    </div>

    <!-- Accueil.php:61 -->






    <script>

        function getAccueil() {
            const url = '/projet_web_2/Projet2_web/Acceuil';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    //    console.log(response)
                    return response.url;
                }).then((data) => {
                    // if (res.status === 200) {
                    //     return res.json();
                    // } else 
                    // if (res.status === 301 || res.status === 302) {
                    // const redirectedUrl = data.url;
                    // console.log(redirectedUrl);
                    // Redirect to the new URL
                    window.location.href = data;
                    // console.log(res.status === 301);
                    // }
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
                    //    console.log(response)
                    return response.url;
                }).then((data) => {
                    // if (res.status === 200) {
                    //     return res.json();
                    // } else 
                    // if (res.status === 301 || res.status === 302) {
                    // const redirectedUrl = data.url;
                    console.log("DB_663", data);
                    // Redirect to the new URL
                    window.location.href = data;
                    // console.log(res.status === 301);
                    // }
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
                    // if (res.status === 200) {
                    //     return res.json();
                    // } else 
                    // if (res.status === 301 || res.status === 302) {
                    // const redirectedUrl = data.url;
                    // console.log(redirectedUrl);
                    // Redirect to the new URL
                    window.location.href = data;
                    // console.log(res.status === 301);
                    // }
                }).catch(error => {
                    console.error('Fetch error:', error);
                });

        }

        function getProduits() {

        }

        function getInfolettre() {
            const url = '/projet_web_2/Projet2_web/Infolettre';
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    //    console.log(response)
                    return response.url;
                }).then((data) => {
                    // if (res.status === 200) {
                    //     return res.json();
                    // } else 
                    // if (res.status === 301 || res.status === 302) {
                    // const redirectedUrl = data.url;
                    console.log("DB_663", data);
                    // Redirect to the new URL
                    window.location.href = data;
                    // console.log(res.status === 301);
                    // }
                }).catch(error => {
                    console.error('Fetch error:', error);
                });
        }

        function getContact() {

        }



        // var infolettreLink = document.querySelector(".navLink_infolettre a");

        // if (infolettreLink) {
        //     infolettreLink.addEventListener("click", function (event) {
        //         event.preventDefault(); // Prevent the default link behavior
        //         showPopup();

        //     });
        // }

        // function showPopup() {
        //     var popupForm = document.getElementById("popup-form");
        //     popupForm.style.display = "block";
        // }
        // function showPopup() {
        //     var popupForm = document.getElementById("popup-form");
        //     popupForm.style.display = "block";
        // }

    </script>


    <script>

    </script>

</header>

</html>
