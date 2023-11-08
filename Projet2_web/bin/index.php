<?php
require_once 'controller/Utilisateurs.php';


// La connexion à la DB est généralement placé dans un fichier séparé,``GestionnaireDeBD`` par exemple,
// qui serait un singleton. Ce qui donnerait le code suivant:
// $dbManager = DBManager::getInstance();
// $controller = new UtilisateursController($dbManager->getDBConnection());
// Mais pour gagner du temps, on fait comme ceci:
/*session_start();
if (!isset($_SESSION['admin']) || !$_SESSION['admin']['isAuth']) {
  header('Location: ../login.php');
  exit();
}
*/
$pdo = new PDO(
    'mysql:host=localhost;dbname=test',
    'thom',
    '1234'
);
$controller = new UtilisateursController($pdo);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
//$uri = "/" . implode('/', array_splice(explode('/', $uri), 2));
echo "URI : " . $uri . "<br>";
echo "Méthode : " . $method . "<br>";
switch ($method | $uri) {
    case ($method == 'GET' && $uri == '/api/utilisateurs'):
        $users = $controller->getAllUsers();
        echo json_encode($users);
        break;
    case ($method == 'GET' && preg_match('/\/api\/utilisateurs\/[1-9]+/', $uri)):
        $id = end(explode('/', $uri));
        $user = $controller->getUserById($id);
        echo json_encode($user);
        break;  
        case($method == 'POST' && $uri == '/api/login'):
            $data = $_POST;
            echo $data['username'].$data['MotDePasse'];
            $result = $controller -> login($data['username'],$data['MotDePasse']);        
            print_r ($result);
            break;
    case ($method == 'POST' && $uri == '/api/utilisateurs'):
        $data = $_POST;
        $result = $controller->createUser($data);
        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Utilisateur créé avec succès"
            ]);

        } else {
            echo json_encode([
                "success" => false,
                "message" => "Échec de la création
de l'utilisateur"
            ]);
        }
        break;
    case ($method == 'PUT' && preg_match('/\/api\/utilisateurs\/[1-9]+/', $uri)):
        $data =  file_get_contents("php://input");
        echo $data;
        $id = end(explode('/', $uri));
        $user = $controller->updateUser($id,$data);
        echo json_encode($user);
        break;
    case ($method == 'DELETE'  && preg_match('/\/api\/utilisateurs\/[1-9]+/', $uri)): 
        $id = end(explode('/', $uri));
        $user = $controller->deleteUser($id);
        echo json_encode($user);
        break;
  

    default:
        echo "Erreur : Chemin non reconnu ou non pris en charge.";
}
function isAuthenticated()
{
    session_start();
    return isset($_SESSION['admin']) && $_SESSION['admin']['isAuth']; // doit être   `true` et `true`

}
// Sécurité pour certaines routes spécifiques
if (str_contains($uri, 'api/utilisateurs') && !isAuthenticated()) {
    header('Location: ./login.php');
    exit();
}

function endConnection() {
  session_start();
  session_destroy();
  echo json_encode(["success" => true, "message" => "Déconnecté avec succès"]);
}
//$dbManager = DBManager::getInstance();
