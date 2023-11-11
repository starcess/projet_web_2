<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="body_container">
        <div class="ImageContainer">

        </div>

    </div>

</body>


<script>
    function getProduitinfo() {
        const url = '/projet_web_2/Projet2_web/unProduitInfo';
        // echo "URI : " . $uri . "<br>";
        // echo "Méthode : " . $method . "<br>";
        // console.log("hi");
        fetch(url)
            .then(response => {
                if (response.status !== 200) {
                    console.log('Error: Non-200 status code');
                    return [];
                }
                console.log(response.text())
                // return response.json();
            }).then(data => {
                // if (data.length > 0) {
                //     // data.forEach(data => {

                //     // });
                // }
            })
            .catch(error => console.log(error));
    }

    getProduitinfo();
</script>

</html>