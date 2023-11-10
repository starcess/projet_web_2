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
        <h1>allo</h1>
        <div class="ImageContainer">
            <?php
            // Créez une instance de la classe Produit en passant la connexion à la base de données
            $produit = new ProduitController();

            // Récupérez un produit spécifique par son ID (remplacez 1 par l'ID du produit que vous souhaitez afficher)
            $productId = 1;
            $product = $produit->getProduitById($productId);

            // Vérifiez si le produit a été trouvé
            if ($product) {
                $class = '';
                $nomFichier = pathinfo($product['image'], PATHINFO_FILENAME);

                // Déterminez la classe en fonction du type de produit
                if (str_contains($product['type'], $cravatte)) {
                    $class = 'cravatte';
                } elseif (str_contains($product['type'], $chemise)) {
                    $class = 'chemise';
                }

                // Affichez le bloc HTML pour le produit
                echo "<div id='$nomFichier' class='$class'>";
                echo "<a href='javascript:getProduit();' class='$class'>";
                echo "<img src='{$product['image']}' alt='{$product['description']}'>";
                echo "</a></div>";
            } else {
                echo "Produit non trouvé.";
            }
            ?>
        </div>

        <!-- Vous pouvez ajouter le code HTML pour afficher la description, le prix, etc. ici -->

    </div>

</body>

</html>