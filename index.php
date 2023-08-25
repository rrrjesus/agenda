<?php

ob_start(); // Controle de Cash

require __DIR__."/vendor/autoload.php";

/**
 * BOOTSTRAP
 */
use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->get("/home", "Web:home");
$route->get("/sobre", "Web:about");

//agenda
$route->group("/agenda");
$route->get("/", "Web:contact");

//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");
$route->get("/recuperar", "Web:forget");
$route->post("/recuperar", "Web:forget");
$route->get("/recuperar/{code}", "Web:reset");
$route->post("/recuperar/resetar", "Web:reset");

//optin
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

/**
 * APP
 */
$route->group("/app");
$route->get("/", "App:home");
$route->get("/sair", "App:logout");

/**
 * ERROR ROUTES
 */
$route->namespace("Source\App")->group("/ops"); //Estilize a rota de erros
$route->get("/{errcode}", "Web:error"); //Trate os erros

/**
 * ROUTE
 */
$route->dispatch(); // Execute a rota

/**
 * ERROR REDIRECT
 */
if($route->error()) {
    $route->redirect("/ops/{$route->error()}"); //Apresente na url ops o código de erro
}


ob_end_flush(); // Entrega de Cash

