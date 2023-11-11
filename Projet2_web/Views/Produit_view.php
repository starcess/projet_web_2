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
    <div id="body_container">
       

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
        })
            .catch(error => console.log(error));
    }
    function afficherInfoProduit(data) {
            // Sélectionnez l'élément contenant les informations du produit
            const container = document.getElementById('body_container');

            // Créez des éléments HTML pour afficher les informations
            const containerTxt = document.createElement('div')            
            const prixElement = document.createElement('p');
            prixElement.textContent = 'Prix : ' + data.prix;

            const descriptionElement = document.createElement('p');
            descriptionElement.textContent = 'Description : ' + data.description;

            const imageElement = document.createElement('img');
            imageElement.src = data.image;
            imageElement.alt = 'Image du produit';

            // Ajoutez les éléments à la page
            container.appendChild(imageElement);
            container.appendChild(containerTxt);
            containerTxt.appendChild(prixElement);
            containerTxt.appendChild(descriptionElement);           
            
        }

    getProduitinfo();
</script>

</html>