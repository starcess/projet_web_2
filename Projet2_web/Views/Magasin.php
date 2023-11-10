<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/magasin_styles.css">
    <link rel="stylesheet" href="./Css/filterNav.css">
    <title>Liste De Produit</title>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="magasin_container">


        <div id="filter_container">
            <div class="type">
                <p class="type_title">TYPE</p>
                <select id="type">
                    <option value="" selected>Tous les types</option>
                    <option value="chemise">Chemise</option>
                    <option value="cravate">Cravate</option>
                </select>
            </div>

            <div iclass="couleur">
                <p class="type_title">CRAVATTE</p>
                <select id="couleur">
                    <option value="" selected>Toutes les couleurs</option>
                    <option value="rouge">Rouge</option>
                    <option value="bleu">Bleu</option>
                </select>
            </div>
            <div class="slidecontainer">
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                <p class="slider_value">Valeur: <span id="demo"></span></p>
            </div>
            <button onclick="filtrerProduits()">Filtrer</button>
        </div>

        <div id="item_container">
            <?php
            $directory = getcwd();
            $img_directory = "../Ressource/products_img";
            // echo "img_directory : " . $img_directory . "<br>";
            // print($img_directory);
            $pattern = "*.png";
            $cravatte = "cravatte";
            $chemise = "chemise";
            if ($img_directory != false) {
                $files = glob($img_directory . '/' . $pattern);
                foreach ($files as $file) {
                    $class = '';
                    $nomFichier = pathinfo($file, PATHINFO_FILENAME);
                    // echo "file : " . $file . "<br>";
                    // print_r($file);
                    if (str_contains($file, $cravatte)) {
                        $class = 'cravatte';
                    } elseif (str_contains($file, $chemise)) {
                        $class = 'chemise';
                    }
                    $msg = "<div id='$nomFichier' class='$class'><a href='javascript:getProduit();' class='$class'><img src='$file' alt='$file'></a></div>";
                    echo $msg;
                    // print("DB_9". $msg);
                }
            } else {
                echo "The specified directory does not exist.";
            }
            ?>
        </div>

    </div>


    <script>

        function getProduit() {
            const url = 'Produit_view.php';

            fetch(url, {
                method: "GET",
                redirect: "follow",
                headers: {
                    "Accept": "application/json, text/plain, */*",
                    "Content-Type": "application/json" // Corrected header name
                }
            }).then((res) => {
                // if (res.status === 200) {
                //     return res.json();
                // } else 
                // if (res.status === 301 || res.status === 302) {
                const redirectedUrl = res.url;
                console.log(redirectedUrl);
                // Redirect to the new URL
                window.location.href = redirectedUrl;
                console.log(res.status === 301);
                // }
            }).catch(error => {
                console.error('Fetch error:', error);
            });
        }



        document.addEventListener("DOMContentLoaded", function () {
            // Get references to your HTML elements
            const typeSelect = document.getElementById("type");
            const couleurSelect = document.getElementById("couleur");
            const priceRange = document.getElementById("myRange");
            const priceValue = document.getElementById("demo");

            // Add event listeners to capture user selections
            typeSelect.addEventListener("change", filterProducts);
            couleurSelect.addEventListener("change", filterProducts);
            priceRange.addEventListener("input", filterProducts);

            function filterProducts() {
                // Get the selected values
                const selectedType = typeSelect.value;
                const selectedCouleur = couleurSelect.value;
                const selectedPrice = priceRange.value;

                // Use the selected values to filter your products
                // For example, you can show/hide products based on the criteria selected.
                // You can also use AJAX to request filtered products from a server.

                // For demonstration purposes, we'll just display the selected values.
                console.log("Selected Type: " + selectedType);
                console.log("Selected Couleur: " + selectedCouleur);
                console.log("Selected Price: " + selectedPrice);

                // Update the displayed price value
                priceValue.textContent = selectedPrice;
            }
        });

    </script>



</body>

</html>