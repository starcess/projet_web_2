<?php

require __DIR__ . "/API/Controllers/UtilisateurController.php";
require __DIR__ . "/API/Controllers/ProduitController.php";
require __DIR__ . "/API/Controllers/InfolettreController.php";
require __DIR__ . "/API/DbManager/DatabaseManager.php";

$username = "guest";
$password = "123";
$db = DB::getInstance($username, $password);
$pdo = $db->getPdo();
// $pdo = new PDO(
//     'mysql:host=localhost;dbname=projet2',
//     $username,
//     $password
// );

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // print("RB_98 hasSessionDestroyed :" . session_destroy() . "<br>");
    // print("RB_97 hasSessionStarted :" . session_start() . "<br>");
}
// $_SESSION['info'] = "blah";

$userInfo;
$controller_utilisateur = new UtilisateurController($pdo);
$controller_produit = new ProduitController($pdo);
$controller_infolettre = new InfolettreController($pdo);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// print("RB_74 : " . $method . "<br>");
$exploded_uri = explode('/', $uri);
$uri = "/" . implode('/', array_splice($exploded_uri, 3));
// print("RB_5 : " . $uri . "<br>");
// echo "URI : " . $uri . "<br>";
// echo "Méthode : " . $method . "<br>";

switch ($method) {
    case 'GET':
        if ($uri == '/') {
            header('Location: /Accueil');
            exit;
        } elseif ($uri == '/ajouter') {
            header('Location: /ajouter');
            exit;
        } elseif ($uri == '/RendezVous') {
            header('Location: /RendezVous');
            exit;
        } elseif ($uri == '/afficher') {
            header('Location: /afficher');
            exit;
        } elseif ($uri == '/Contact') {
            header('Location: /Contact');
            exit;
        } else {
            // Optional: handle unknown URIs
            header('Location: /404');
            exit;
        }
        break;

    default:
        // Handle other HTTP methods or add a default action
        break;
}

?>

?>