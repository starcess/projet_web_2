<?php



require __DIR__ . "/API/Controllers/UtilisateurController.php";
require __DIR__ . "/API/Controllers/ProduitController.php";
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

$controller_utilisateur = new UtilisateurController($pdo);
$controller_produit = new ProduitController($pdo);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// print("RB_74 : " . $method . "<br>");
$exploded_uri = explode('/', $uri);
$uri = "/" . implode('/', array_splice($exploded_uri, 3));
// print("RB_5 : " . $uri . "<br>");
// echo "URI : " . $uri . "<br>";
// echo "Méthode : " . $method . "<br>";


function isAuthenticated()
{
    // session_start();
    // print_r("RB_9 isSessionStarted : " .$_SESSION . "<br>");
    echo "RB_75 :" . isset($_SESSION['admin']) . "<br>";
    echo "RB_76 :" . $_SESSION['admin']['isAuth'] . "<br>";
    $verify = isset($_SESSION['admin']) && $_SESSION['admin']['isAuth'] == true;
    // print("RB_1" . $verify . "<br>");
    return $verify;
}


function logTheUser($controller_utilisateur)
{
    $data = $_POST;
    $email = $data['email'];
    $password = $data['password'];
    echo "email : " . $email . "<br>";
    echo "password : " . $password . "<br>";
    $controller_utilisateur->login($email, $password);
    $result = isAuthenticated();
    // print("RB_2" . $result . "<br>");
    echo "result : " . $result . "<br>";
    return $result;
}


function showUtilisateurs($isAdmin, $controller_utilisateur)
{
    if ($isAdmin) {
        echo "Login successful" . "<br>";
        header('Location:  __DIR__' . '/../../spa.php');
        // echo 'isAuthenticated() = true -  eee' . '<br>';
        $users = $controller_utilisateur->getAllUsers();
        echo "RB_63" . json_encode($users) . "<br>";
        // endConnection(); 
        // header('Location: __DIR__' . '/../../spa.php');
        return json_encode($users);
    } else {
        echo "Login unsuccessful" . "<br>";
        header('Location: __DIR__' . '/../../Magasin.php');
        echo 'hi_2';
        // return json_encode([
        //     "success" => false,
        //     "message" => "Échec de la connection de l'utilisateur"
        // ]);
    }
}


function endConnection()
{
    // session_start();
    session_destroy();
    echo json_encode(["success" => true, "message" => "Déconnecté avec succès"]);
}


switch ($method | $uri) {
    case ($method == 'GET' && $uri == '/'):
        if ($uri == '/') {
            // print(__DIR__ . '/Views/Accueil.php');
            header('Location: __DIR__' . '/../Views/Accueil.php');
            // print('YO acceuil_images');
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
            $bool = false;
            if ($bool == true) {
                header('Location: __DIR__' . '/../Views/Account.php');
            } else if ($bool == false) {
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
    case ($method == 'GET' && $uri == '/acceuil_images'):
        if ($uri == '/acceuil_images') {
            // print('YO acceuil_images');
            //print(__DIR__ . '/Views/Account.php');
            $data = $controller_produit->getAllProduit();
            // print_r($data);
            echo json_encode($data);
        }
        break;
    case ($method == 'GET' && $uri == '/../Views/Produit_view.php'):
        if ($uri == 'Produit_view') {
            print('YO Produit_view');
            header('Location: __DIR__' . '/../Views/Produit_view.php');
        }
        break;
    case ($method == 'GET' && $uri == '/Infolettre'):
        if ($uri == '/Infolettre') {
            // return print('YO Infolettre');
            header('Location: __DIR__' . '/../Views/Infolettre.php');
            // exit;
        }
        break;
    case ($method == 'POST' && $uri == '/Login'):
        if (isset($_POST['Login'])) { 
            $isAdmin = logTheUser($controller);
            // showUtilisateurs($isAdmin, $controller);
        }
        break;
    case ($method == 'POST' && $uri == '/SignUp'):
        if ($uri == '/SignUp') {

        }
        break;
    default:
        echo "Erreur : Chemin non reconnu ou non pris en charge.";


}









?>