<?php

$user_pseudo = !empty($_POST['user_pseudo']) ? $_POST['user_pseudo'] : NULL;
$user_password = !empty($_POST['user_password']) ? $_POST['user_password'] : NULL;

spl_autoload_register(function($class){
    // echo("class : ".$class."\n");
    require_once('../model/'.$class.'.php');
});

$userManager = new UserManager();
$userManager->loginUser($user_pseudo, $user_password);











// require_once('classes/database.php');
// require_once('classes/user.php');

// $dbo = new Database('localhost', 'allosimplon', 'root', '');
// $db = $dbo->getDb();
// var_dump($db);
// // $db = $db_conn->PDOConnexion();

// $user = new User($db);
// var_dump($user);
// $connect_result = $user->connect($user_pseudo, $user_password);
// if($connect_result=="success") {
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
//     // echo "Connexion OK";
// } else if ($connect_result=="need_mail_verification"){
//     header('Location: ../index.php?verify_mail=true');
//     // echo "Connexion FAILED";
// } else {
//     echo "Connexion FAILED";
// }





















////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// include('connect_db.php');
// $db_conn = new Database('localhost', 'allosimplon', 'root', '');
// $db = $db_conn->PDOConnexion();


// echo "user_pseudo : $user_pseudo";
// echo "\n<br>user_password : $user_password";
// echo "\n\n<br><br>";

// $stmt = $db->prepare('SELECT * FROM users WHERE user_pseudo=:user_pseudo AND user_password=:user_password');
// $stmt->execute(array(
//     'user_pseudo' => $user_pseudo,
//     'user_password' => $user_password
// ));

// Méthode sans fetch !!!
// $count = $stmt->rowCount(); // Compter les rows retournés.
// // echo "rowCount : $count\n<br>";
// if($count>0) {
//     $results = $stmt->fetch(PDO::FETCH_OBJ);
//     // echo 'Login SUCCESS';
//     session_start();
//     $_SESSION['id_user'] = $results->id_user;
//     $_SESSION['user_pseudo'] = $results->user_pseudo;
//     $_SESSION['user_firstname'] = $results->user_firstname;
//     $_SESSION['user_lastname'] = $results->user_lastname;
//     // echo "Session : user_pseudo : ".$_SESSION['user_pseudo'];
//     // echo "\n<br>Session : is_user : ".$_SESSION['id_user'];
//     // echo "\n\n<br><br>";
//     // header('location:/index.php');
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// }else{
//     echo 'Login FAIL';
// }



// Méthode avec fetch :
// if($resultat['pass']==$pass) {
//     session_start();
//     $_SESSION['id_user'] = $resultat['id_user'];
//     $_SESSION['user_mail'] = $resultat['user_mail'];
//     header('location:tabadmin/index.html')
// }

//détruire session
//$_SESSION = array();
//session_destroy();

//utiliser session
// if( isset($_SESSION['id_user']) AND isset($_SESSION['user_mail']) ) ...

?>