<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>

    <?php include('header.php'); ?>
    <h1 id="produit_title"></h1>
    <div id="body_container">


    </div>
    <h2>Suggestion</h2>
    <div id="autre_option">

    </div>
</body>


<script>
    function getProduitinfo() {
        const url = '/projet_web_2/Projet2_web/unProduitInfo';
        fetch(url)
            .then(response => {
                if (response.status !== 200) {
                    console.log('Error: Non-200 status code');
                    return [];
                }
                return response.json();
            }).then(data => {
                console.log(data);
                // Vous pouvez accéder aux propriétés de l'objet data comme ceci :
                console.log(data.id);
                console.log(data.prix);
                console.log(data.description);
                console.log(data.image);
                console.log(data.type);
                console.log(data.taille);
                console.log(data.couleur);
                afficherInfoProduit(data)
            })
            .catch(error => console.log(error));
    }

    function afficherInfoProduit(data) {
        img_directory = "../Ressource/products_img/";
        // Sélectionnez l'élément contenant les informations du produit
        const container = document.getElementById('body_container');
        let imageName = data.image
        let titleWithoutExtension = imageName.replace(/\.[^/.]+$/, "");
        const titleElement = document.getElementById('produit_title');
        const containerTxt = document.createElement('div')
        const prixElement = document.createElement('p');
        titleElement.textContent = titleWithoutExtension;
        prixElement.textContent = 'Prix : ' + data.prix;
        prixElement.classList.add('prix');
        const descriptionElement = document.createElement('p');
        descriptionElement.textContent = 'Description : ' + data.description;

        const imageElement = document.createElement('img');
        imageElement.src = img_directory + '/' + data.image;
        imageElement.alt = data.image;
        const randomColor = choisirCouleurAleatoire();
        imageElement.style.borderColor = randomColor;

        // Ajoutez les éléments à la page
        container.appendChild(imageElement);
        container.appendChild(containerTxt);
        containerTxt.appendChild(prixElement);
        containerTxt.appendChild(descriptionElement);

        type = data.type
        autreOptionDispo(type, imageName);
    }

    function autreOptionDispo(type, clickedProduct) {
        console.log("type : ", type)
        let filteredValues = {
            type: type,
            couleur: null,
            minPrice: 0,
            maxPrice: 0
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
                    // console.log(data)
                    afficherAutreOptionDispo(data, clickedProduct)
                }
            })
            .catch(error => console.log(error));

    }

    function afficherAutreOptionDispo(produits, clickedProduct) {
        const divItem_container = document.getElementById('autre_option');
        divItem_container.innerHTML = '';
        img_directory = "../Ressource/products_img/";
        produits.forEach(produit => {
            if (produit.image != clickedProduct) {
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
                // img.onclick = afficherUnProduit;


                oneProductContainer.appendChild(productNameElement);
                oneProductContainer.appendChild(prixElement);
                oneProductContainer.appendChild(img);
                divItem_container.appendChild(oneProductContainer);
                // document.body.appendChild(divItem_container);
            }

        });
    }

    function choisirCouleurAleatoire() {
        const couleurs = ['#ff71ce', '#01cdfe', '#05ffa1', '#b967ff', '#fffb96'];
        const couleurAleatoire = couleurs[Math.floor(Math.random() * couleurs.length)];
        return couleurAleatoire;
    }

    getProduitinfo();

</script>

</html>