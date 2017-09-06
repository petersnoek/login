<?php
session_start();

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1:3306');
define('DB_NAME', 'login');
define('DB_USER', 'login');
define('DB_PASS', 'login');
define('DB_CHARSET', 'utf8');
$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
	
$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);


$un = $_POST['username'];
$pw = $_POST['password'];

// kijk of de gebruiker voorkomt in de tabel users
$sql = "SELECT * FROM users WHERE username='".$un."' AND password='".$pw."' ";
$_SESSION['query'] = "Query: " . $sql . "</p>";

$query = $db->prepare($sql);
$query->execute();
$db = null;
$count = $query->rowCount();
$results = $query->fetch();
$user_id = $results['id'];
$user_name = $results['username'];

if ($count == 0) {
	$_SESSION['errors'][] = "Ongeldige combinatie van gebruikersnaam en wachtwoord.";
	header("location:loginform.php");
	exit;
}
if ($count >0 ) {
	$_SESSION['username'] = $user_name;
	$_SESSION['status'][] = "User " . $user_name . " ingelogd." ;
	header("location:index.php");
	exit;
}





var_dump($results);