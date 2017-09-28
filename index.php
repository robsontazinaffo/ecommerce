<?php 

session_start();

require_once("vendor/autoload.php");
//require_once("functions.php");


use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

// Pagina do Site
$app->get('/', function() {
    
	$page = new Hcode\Page();

	$page->setTpl("index");

});


// pagina de administração
$app->get('/admin', function() {

	User::verifyLogin();
    
	$page = new Hcode\PageAdmin();

	$page->setTpl("index");

});


// pagina de login
$app->get('/admin/login', function() {
    
	$page = new Hcode\PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

// pagina de login
$app->post('/admin/login', function() {
    
	User::login($_POST["login"], $_POST["password"]);
	header("Location: /admin");
	exit;

//	User::login(post('deslogin'), post('despassword'));
//	header("Location: /admin");
//	exit;

});

$app->get('/admin/logout', function() {

	User::logout();
	header("Location: /admin/login");
	exit;

});



$app->run();

 ?>