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
                    <option value="chemise">chemise</option>
                    <option value="cravatte">cravatte</option>
                </select>
            </div>

            <div class="couleur">
                <p class="type_title">CRAVATTE</p>
                <select id="couleur">
                    <option value="" selected>Toutes les couleurs</option>
                    <option value="rouge">Rouge</option>
                    <option value="bleu">Bleu</option>
                    <option value="vert">Vert</option>
                    <option value="jaune">Jaune</option>
                    <option value="noir">Noir</option>
                    <option value="blanc">Blanc</option>
                    <option value="gris">Gris</option>
                    <option value="rose">Rose</option>
                    <option value="violet">Violet</option>
                    <option value="orange">Orange</option>
                    <option value="brun">brun</option>
                    <option value="turquoise">Turquoise</option>
                    <option value="argent">Argent</option>
                    <option value="or">Or</option>
                    <option value="beige">Beige</option>
                    <option value="corail">Corail</option>
                </select>
            </div>
            <div class="slidecontainer">
                <p class="type_title">Prix des Produits</p>
                <label for="minPrice">Minimum</label>
                <input type="number" id="minPrice" name="minPrice" placeholder="1" class="price_input">

                <label for="maxPrice">Maximum</label>
                <input type="number" id="maxPrice" name="maxPrice" placeholder="1000" class="price_input">
                <!-- <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                <p class="slider_value">Valeur: <span id="demo"></span></p> -->
            </div>
            <button id="filter_button">Filtrer</button>
        </div>

        <div id="item_container"></div>

    </div>

    </div>


    <script>

        function displayImages(produits) {
            const divItem_container = document.getElementById('item_container');
            divItem_container.innerHTML = '';
            img_directory = "../Ressource/products_img/";
            produits.forEach(produit => {
                let className = '';
                let produitId = produit.image;
                if (produit.type == 'cravatte') {
                    className = 'cravatte';
                } else if (produit.type == 'chemise') {
                    className = 'chemise';
                }
                // Create the div and image elements        
                // div.className = className;

                const oneProductContainer = document.createElement('div')
                const prixElement = document.createElement('p');
                const productNameElement = document.createElement('p');
                let img = document.createElement('img');


                
                let titleWithoutExtension = produitId.replace(/\.[^/.]+$/, "");
                prixElement.textContent = 'Prix : ' + produit.prix;
                productNameElement.textContent = titleWithoutExtension;
               
              
                img.id = produitId
                img.src = img_directory + '/' + produitId;
                img.alt = produitId;
                img.className = className;
                img.onclick = afficherUnProduit;


                oneProductContainer.appendChild(productNameElement);
                oneProductContainer.appendChild(prixElement);
                oneProductContainer.appendChild(img);
                divItem_container.appendChild(oneProductContainer);
                // document.body.appendChild(divItem_container);
            });
        }

        function afficherUnProduit(event) {
            let id = event.target.id;
            console.log('id :', id);
            let img = document.getElementById(id);
            console.log('img :', img);
            getProduitUrl(img.id)
            // window.location.href = '/../Views/Produit_view.php?=' + produitId;
        }

        function getProduitUrl(produitId) {
            // https://stackoverflow.com/questions/54531563/nativescript-js-send-urlsearchparams-into-post-request
            const url = '/projet_web_2/Projet2_web/unProduit';
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ "productId": produitId }),
            })
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    // console.log(response.text())
                    return response.url;
                }).then(data => {
                    // if (data.length > 0) {
                    // data.forEach(data => {
                    // html += `<p>${flower}</p>`;
                    // console.log(data)
                    window.location.href = data;
                    // addCarouselImages(data);
                    // });
                    // }


                })
                .catch(error => console.log(error));

        }



        function getProduits() {
            const url = '/projet_web_2/Projet2_web/liste_produit';
            // echo "URI : " . $uri . "<br>";
            // echo "Méthode : " . $method . "<br>";
            // console.log("hi");
            fetch(url)
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    //console.log(response.json())
                    return response.json();
                }).then(data => {
                    if (data.length > 0) {
                        displayImages(data);
                        // data.forEach(data => {

                        // });
                    }
                })
                .catch(error => console.log(error));
        }


        let typeSelect, couleurSelect, priceRange, priceValue, filterButton, minPriceInput, maxPriceInput;

        document.addEventListener("DOMContentLoaded", function () {
            // Initialize references to your HTML elements
            typeSelect = document.getElementById("type");
            couleurSelect = document.getElementById("couleur");
            // priceRange = document.getElementById("myRange");
            // priceValue = document.getElementById("demo");
            filterButton = document.getElementById("filter_button");
            minPriceInput = document.getElementById("minPrice");
            maxPriceInput = document.getElementById("maxPrice");
            filterButton = document.getElementById("filter_button");

            // Add event listeners to capture user selections
            // typeSelect.addEventListener("change", getFiltrationValues);
            // couleurSelect.addEventListener("change", getFiltrationValues);
            // priceRange.addEventListener("input", getFiltrationValues);
            // minPriceInput.addEventListener("input", getFiltrationValues);
            // maxPriceInput.addEventListener("input", getFiltrationValues);
            filterButton.addEventListener("click", getFiltrationValues);
        });


        function getFiltrationValues() {
            // Get the selected values
            const selectedType = typeSelect.value;
            const selectedCouleur = couleurSelect.value;
            const selectedMinPrice = minPriceInput.value;
            const selectedMaxPrice = maxPriceInput.value;
            // const selectedPrice = priceRange.value;

            // console.log("Selected Type: " + selectedType);
            // console.log("Selected Couleur: " + selectedCouleur);
            // // console.log("Selected Price: " + selectedPrice);
            // console.log("Selected Min Price: " + selectedMinPrice);
            // console.log("Selected Max Price: " + selectedMaxPrice);
            // priceValue.textContent = selectedPrice;
            sendValuesToController(selectedType, selectedCouleur, selectedMinPrice, selectedMaxPrice);
        }


        function sendValuesToController(type, couleur, minPrice, maxPrice) {
            let filteredValues = {
                type: type,
                couleur: couleur,
                minPrice: minPrice,
                maxPrice: maxPrice
            };
            let dataToSend = JSON.stringify(filteredValues);
            let url = '/projet_web_2/Projet2_web/filterValues';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: dataToSend
            })
                .then(response => {
                    if (response.status !== 200) {
                        console.log('Error: Non-200 status code');
                        return [];
                    }
                    // console.log(response.json())
                    return response.json();
                }).then(data => {
                    if (data.length > 0) {
                        displayImages(data);
                        // console.log(data)
                    }

                })
                .catch(error => console.log(error));

        }

        getProduits();

    </script>



</body>

</html>