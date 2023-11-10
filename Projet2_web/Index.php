<?php

require __DIR__ . "/API/Controllers/UtilisateurController.php";
require __DIR__ . "/API/Controllers/ProduitController.php";
require __DIR__ . "/API/Controllers/InfolettreController.php";
require __DIR__ . "/API/DbManager/DatabaseManager.php";

$username = "guest";
$password = "123";
// $pdo = DB::getInstance($username, $password);
$pdo = new PDO(
    'mysql:host=localhost;dbname=projet2',
    $username,
    $password
);

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


function verifyLoginAuthentification()
{
    // session_start();
    // print_r("RB_9 isSessionStarted : " .$_SESSION . "<br>");
    // echo "RB_75 :" . isset($_SESSION['admin']) . "<br>";
    // echo "RB_76 :" . $_SESSION['isAuthenticated'] . "<br>";
    $isAuthenticated = $_SESSION['isAuthenticated'] == true;
    // print("RB_1" . $isAuthenticated . "<br>");
    return $isAuthenticated;
}


function logTheUser($controller_utilisateur)
{
    $data = $_POST;
    $email = $data['email'];
    $password = $data['password'];
    echo "email : " . $email . "<br>";
    echo "password : " . $password . "<br>";
    $controller_utilisateur->login($email, $password);
    $result = verifyLoginAuthentification();
    // print("RB_2" . $result . "<br>");
    echo "result : " . $result . "<br>";
    return $result;
}



function endConnection()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    // return json_encode(["success" => true, "message" => "Déconnecté avec succès"]);
}


function createUser($controller_utilisateur)
{
    $data = $_POST;
    $data = $_POST;
    // $nom = $data['nom'];
    // $prenom = $data['prenom'];
    // $email = $data['email'];
    // $password = $data['password'];
    $isCreated = $controller_utilisateur->createUser($data);
    return $isCreated;
}



function sendMessagePage($message)
{
    // $message = "vous êtes éja inscris dan l'infolettre";
    return header('Location: __DIR__' . '/../Views/MessagePage.php?message=' . urlencode($message));
}


switch ($method | $uri) {
    case ($method == 'GET' && $uri == '/'):
        if ($uri == '/') {
            // print(__DIR__ . '/Views/Accueil.php');
            header('Location: __DIR__' . '/../Views/Accueil.php');
            // print('YO liste_produit');
            //print(__DIR__ . '/Views/Account.php');
            // $data = $controller_produit->getAllProduit();
            // print_r($data);
            // return json_encode($data);
        }
        break;
    case ($method == 'GET' && $uri == '/Magasin'):
        if ($uri == '/Magasin') {
            print('YO magasin');

            //print(__DIR__ . '/Views/Magasin.php');
            header('Location: __DIR__' . '/../Views/Magasin.php');
        }
        break;
    case ($method == 'GET' && $uri == '/Account'):
        if ($uri == '/Account') {
            // print('YO Account');
            //print(__DIR__ . '/Views/Account.php');
            $bool = verifyLoginAuthentification();
            if ($bool) {
                header('Location: __DIR__' . '/../Views/Account.php');
            } else {
                header('Location: __DIR__' . '/../Views/Login_SignUp.php');
            }
        }
        break;
    case ($method == 'GET' && $uri == '/Acceuil'):
        if ($uri == '/Acceuil') {
            // print('YO Accueil');
            //print(__DIR__ . '/Views/Account.php');
            header('Location: __DIR__' . '/../Views/Accueil.php');
        }
        break;
    case ($method == 'GET' && $uri == '/liste_produit'):
        if ($uri == '/liste_produit') {
            // print('YO liste_produit');
            //print(__DIR__ . '/Views/Account.php');
            $data = $controller_produit->getAllProduit();
            // print_r($data);
            echo json_encode($data);
        }
        break;
    case ($method == 'POST' && $uri == '/unProduit'):
        // print('YO Produit_view');
        // if (isset($_GET['productId'])) {
        //     $productId = $_GET['productId'];
        //     // Now, you can use $productId safely
        // }
        // $data = $_POST;
        // print_r($data);
        // $produitId = $data['productId'];
        // echo 'produitId : ' . $produitId . '<br>';
        // header('Location: __DIR__' . '/../Views/Produit_view.php');
        $rawData = file_get_contents('php://input');
        $decodedData = json_decode($rawData, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            // If JSON data was decoded successfully
            $produitId = $decodedData['productId'];
            // echo 'Produit ID: ' . $produitId . '<br>';
            $_SESSION['produitId'] = $produitId;
            header('Location: __DIR__' . '/../Views/Produit_view.php');
        } else {
            echo 'Error decoding JSON';
        }
        break;
    case ($method == 'GET' && $uri == '/Infolettre'):
        if ($uri == '/Infolettre') {
            // return print('YO Infolettre');
            header('Location: __DIR__' . '/../Views/Infolettre.php');
            // exit;
        }
        break;
    case ($method == 'POST' && $uri == '/login'):
        if (isset($_POST['login'])) {
            $isAdmin = logTheUser($controller_utilisateur);
            echo 'The user exist ? ' . $isAdmin . '<br>';
            if ($isAdmin) {
                $data = $_POST;
                // $userInfo = $controller_utilisateur->getUserByEmail($data['email']);
                // $userInfo = $user;
                // echo 'logged user :  ';
                // print_r($user) . '<br>';
                $_SESSION['email'] = $data['email'];
                header('Location: __DIR__' . '/../Views/Account.php');
            } else {
                $message = "Ce compte n'existe pas";
                header('Location: __DIR__' . '/../Views/Login_SignUp.php?message=' . urlencode($message));
            }
            // showUtilisateurs($isAdmin, $controller);
        }
        break;
    case ($method == 'POST' && $uri == '/signup'):
        if (isset($_POST['signup'])) {
            $userIsCreated = createUser($controller_utilisateur);
            echo 'userIsCreated : ' . $userIsCreated . '<br>';
            if ($userIsCreated) {
                $data = $_POST;
                $_SESSION['email'] = $data['email'];
                header('Location: __DIR__' . '/../Views/Account.php');
            } else {
                $message = "Ce courriel a déja été utilisé.";
                header('Location: __DIR__' . '/../Views/Login_SignUp.php?message=' . urlencode($message));
            }
        }
        break;
    case ($method == 'GET' && $uri == '/logout'):
        $controller_utilisateur->logout();
        $isLoggedOut = $_SESSION['isAuthenticated'] == false;
        if ($isLoggedOut) {
            endConnection();
            return header('Location: __DIR__' . '/../Views/Login_SignUp.php');
        }
        break;
    case ($method == 'GET' && $uri == '/getUserInfo'):
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $user = $controller_utilisateur->getUserByEmail($email);
            $userToSend = [
                'Courriel' => $user['Courriel'],
                'Nom' => $user['Nom'],
                'Prenom' => $user['Prenom']
            ];
            // print_r($userToSend);
            echo json_encode($userToSend);
        }
        break;
    case ($method == 'POST' && $uri == '/updatePassword'):
        if (isset($_POST['updatePassword'])) {
            $data = $_POST;
            // $prenom = $data['prenom'];
            // $nom = $data['nom'];
            // $email = $data['email'];
            // $password = $data['password'];
            // echo $password . '<br>';
            $user = $controller_utilisateur->getUserByEmail($data['email']);
            $passwordISModified = $controller_utilisateur->updateUserPassword($data);
            $userModifier = $controller_utilisateur->getUserByEmail($data['email']);
            if ($passwordISModified) {
                // header('Location: __DIR__' . '/../Views/Account.php');
                $message = "Mot de passe modifié avec succès.";
                sendMessagePage($message);
                exit;
            } else {
                $message = "Le mot de passe n'a pas été modifié";
                sendMessagePage($message);
                exit;
                // echo ' Before update : <br>';
                // print_r($user);
                // echo '<br>';
                // echo ' after update : <br>';
                // print_r($userModifier);
                // echo '<br>';
            }
        }
        break;
    case ($method == 'POST' && $uri == '/suscribeInfolettre'):
        if (isset($_POST['suscribeInfolettre'])) {
            $data = $_POST;
            // $prenom = $data['prenom'];
            // $nom = $data['nom'];
            // $email = $data['email'];
            $infolettreIsCreated = $controller_infolettre->createInfolettre($data);
            if ($infolettreIsCreated) {
                echo 'infolettreIsCreated : ' . $infolettreIsCreated . '<br>';
                header('Location: __DIR__' . '/../Views/Infolettre.php');
            } else {
                $message = "Vous êtes déjà inscrit à l'infolettre";
                sendMessagePage($message);
                exit;
            }
        }
        break;
    default:
        echo "Erreur : Chemin non reconnu ou non pris en charge.";
}









?>