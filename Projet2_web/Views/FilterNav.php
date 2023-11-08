<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/filterNav.css">
    <title>Document</title>

</head>

<body>

    <div id="filter_container">
        <div id="type">
            <select id="type">
                <option value="">Tous les types</option>
                <option value="chemise">Chemise</option>
                <option value="cravate">Cravate</option>
            </select>
        </div>

        <div id="couleur">
            <select id="couleur">
                <option value="">Toutes les couleurs</option>
                <option value="rouge">Rouge</option>
                <option value="bleu">Bleu</option>
            </select>
        </div>
        <div class="slidecontainer">
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
            <p class="slider_value">Value: <span id="demo"></span></p>
        </div>
        <button onclick="filtrerProduits()">Filtrer</button>
    </div>


   


    <script>
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

    <!-- <script>
        function filtrerProduits() {
            const type = document.getElementById("type").value;
            const couleur = document.getElementById("couleur").value;

            // Utilisez JavaScript pour envoyer ces critères au serveur PHP
            // Exécutez la requête PHP pour filtrer les produits
            // Mettez à jour la section "resultats" avec les produits filtrés
        }

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
    </script> -->
</body>

</html>