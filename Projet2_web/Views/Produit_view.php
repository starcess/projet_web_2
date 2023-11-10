<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>

    <?php include('header.php'); ?>
<h1>allo</h1>
    <div class="body_container">
        <div class="img-container">
            <script>
                const url= '/projet_web_2/Projet2_web/acceuil_images'
                fetch(url).then(response => {
                if (response.status !== 200) {
                    console.log('Error: Non-200 status code');
                    return [];
                }
                // console.log(response.json())
                return response.json();
            })
            </script>
        </div>
        <div class="conteneurTxt">
            <div class="conteneurDescription">
                <script>
                    //url =http://localhost:4208/projet_web_2/Projet2_web/Views/unProduit.php
                    fetch
                </script>
            </div>
            <div class="conteneurPrix">
                <script>
                    fetch
                </script>
            </div>

        </div>
        <div class="autreProduit">
            <div class="autreProduit">
                <script>
                    fetch
                </script>
            </div>
        </div>
    </div>

</body>

</html>