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
$route->group("/contatos");
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
$route->group("/dashboard");
$route->get("/", "Dashboard:homeDash");
$route->get("/listar-contatos", "Dashboard:contactDash");
$route->get("/lixeira-contatos", "Dashboard:contactTrashDash");
$route->get("/dashboard/perfil", "Dashboard:userProfile");
$route->get("/listar-usuarios", "Dashboard:userDash");
$route->get("/cadastrar-contato", "Dashboard:registerContact");
$route->post("/cadastrar-contato", "Dashboard:registerContact");
$route->get("/editar-contato/{id}", "Dashboard:updatedContact");
$route->post("/editar-contato", "Dashboard:updatedContact");
$route->get("/excluir-contato/{id}", "Dashboard:deletedContact");
$route->get("/reativar-contato/{id}", "Dashboard:reactivatedContact");
$route->get("/agenda/{id}", "Dashboard:editAg");
$route->get("/listar-setores", "Dashboard:sectorDash");
$route->get("/lixeira-setores", "Dashboard:sectorTrashDash");
$route->get("/cadastrar-setor", "Dashboard:registerSector");
$route->post("/cadastrar-setor", "Dashboard:registerSector");
$route->get("/editar-setor/{id}", "Dashboard:updatedSector");
$route->post("/editar-setor", "Dashboard:updatedSector");
$route->get("/excluir-setor/{id}", "Dashboard:registerSector");
$route->get("/sair", "Dashboard:logout");

//blog
$route->group("/blog");
$route->get("/", "Web:blog");
$route->get("/p/{page}", "Web:blog");
$route->get("/{uri}", "Web:blogPost");
$route->post("/buscar", "Web:blogSearch");
$route->get("/buscar/{terms}/{page}", "Web:blogSearch");
$route->get("/em/{category}", "Web:blogCategory");
$route->get("/em/{category}/{page}", "Web:blogCategory");
$route->get("/por/{author}", "Web:blogAuthor");
$route->get("/por/{author}/{page}", "Web:blogAuthor");

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

