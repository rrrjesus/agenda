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
$route->namespace("Source\App");

/**
 * WEB ROUTES
 */
$route->group(null);
$route->get("/", "Web:home");
$route->get("/home", "Web:home");
$route->get("/sobre", "Web:about");

//agenda de contatos
$route->get("/contatos", "Web:contact");

//email card
$route->get("/email", "Web:creatorCard");

//blog
$route->group("/blog");
$route->get("/", "Web:blog");
$route->get("/p/{page}", "Web:blog");
$route->get("/{uri}", "Web:blogPost");
$route->post("/buscar", "Web:blogSearch");
$route->get("/buscar/{search}/{page}", "Web:blogSearch");
$route->get("/em/{category}", "Web:blogCategory");
$route->get("/em/{category}/{page}", "Web:blogCategory");

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
$route->group(null);
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

//services
$route->group(null);
$route->get("/termos", "Web:terms");

/**
 * APP
 */
$route->group("/dashboard");
$route->get("/", "Dashboard:homeDash");
$route->get("/sair", "Dashboard:logout");

// Users
$route->get("/cadastrar-usuario", "Dashboard:registerUser");
$route->post("/cadastrar-usuario", "Dashboard:registerUser");
$route->get("/perfil", "Dashboard:profile");
$route->post("/perfil", "Dashboard:profile");
$route->get("/editar-usuario/{id}", "Dashboard:updatedUser");
$route->post("/editar-usuario", "Dashboard:updatedUser");
$route->get("/excluir-usuario/{id}", "Dashboard:deletedUser");
$route->get("/excluir-definitivo-usuario/{id}", "Dashboard:deleteUser");
$route->get("/reativar-usuario/{id}", "Dashboard:reactivatedUser");
$route->get("/listar-usuarios", "Dashboard:userDash");
$route->get("/lixeira-usuarios", "Dashboard:userTrashDash");

// Contacts
$route->get("/listar-contatos", "Dashboard:contactDash");
$route->get("/lixeira-contatos", "Dashboard:contactTrashDash");
$route->get("/cadastrar-contato", "Dashboard:registerContact");
$route->post("/cadastrar-contato", "Dashboard:registerContact");
$route->get("/editar-contato/{id}", "Dashboard:updatedContact");
$route->post("/editar-contato", "Dashboard:updatedContact");
$route->get("/excluir-contato/{id}", "Dashboard:deletedContact");
$route->get("/excluir-definitivo-contato/{id}", "Dashboard:deleteContact");
$route->get("/reativar-contato/{id}", "Dashboard:reactivatedContact");

// Sectors
$route->get("/listar-setores", "Dashboard:sectorDash");
$route->get("/lixeira-setores", "Dashboard:sectorTrashDash");
$route->get("/cadastrar-setor", "Dashboard:registerSector");
$route->post("/cadastrar-setor", "Dashboard:registerSector");
$route->get("/editar-setor/{id}", "Dashboard:updatedSector");
$route->post("/editar-setor", "Dashboard:updatedSector");
$route->get("/excluir-setor/{id}", "Dashboard:deletedSector");
$route->get("/excluir-definitivo-setor/{id}", "Dashboard:deleteSector");
$route->get("/reativar-setor/{id}", "Dashboard:reactivatedSector");
$route->get("/reativar-setor-contact/{id}", "Dashboard:reactivatedSectorContact");

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
 * ADMIN ROUTES
 */
$route->namespace("Source\App\Painel");
$route->group("/painel");

//login
$route->get("/", "Login:root");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

//dash
$route->get("/dash", "Dash:dash");
$route->get("/dash/home", "Dash:home");
$route->post("/dash/home", "Dash:home");
$route->get("/logoff", "Dash:logoff");

// Contacts
$route->get("/agenda", "Agenda:contacts");
$route->get("/agenda/contatos", "Agenda:contacts");
$route->get("/agenda/setores", "Agenda:sectors");
$route->get("/agenda/lixeira", "Agenda:contactTrashDash");
$route->get("/agenda/cadastrar", "Agenda:registerContact");
$route->post("/agenda/cadastrar", "Agenda:registerContact");
$route->get("/agenda/editar/{id}", "Agenda:updatedContact");
$route->post("/agenda/editar", "Agenda:updatedContact");
$route->get("/agenda/excluir/{id}", "Agenda:deletedContact");
$route->get("/agenda/excluir-definitivo/{id}", "Agenda:deleteContact");
$route->get("/agenda/reativar/{id}", "Agenda:reactivatedContact");


//control
$route->get("/control/home", "Control:home");
$route->get("/control/subscriptions", "Control:subscriptions");
$route->post("/control/subscriptions", "Control:subscriptions");
$route->get("/control/subscriptions/{search}/{page}", "Control:subscriptions");
$route->get("/control/subscription/{id}", "Control:subscription");
$route->post("/control/subscription/{id}", "Control:subscription");
$route->get("/control/plans", "Control:plans");
$route->get("/control/plans/{page}", "Control:plans");
$route->get("/control/plan", "Control:plan");
$route->post("/control/plan", "Control:plan");
$route->get("/control/plan/{plan_id}", "Control:plan");
$route->post("/control/plan/{plan_id}", "Control:plan");

//blog
$route->get("/blog/home", "Blog:home");
$route->post("/blog/home", "Blog:home");
$route->get("/blog/home/{search}/{page}", "Blog:home");
$route->get("/blog/post", "Blog:post");
$route->post("/blog/post", "Blog:post");
$route->get("/blog/post/{post_id}", "Blog:post");
$route->post("/blog/post/{post_id}", "Blog:post");
$route->get("/blog/categories", "Blog:categories");
$route->get("/blog/categories/{page}", "Blog:categories");
$route->get("/blog/category", "Blog:category");
$route->post("/blog/category", "Blog:category");
$route->get("/blog/category/{category_id}", "Blog:category");
$route->post("/blog/category/{category_id}", "Blog:category");

//faqs
$route->get("/faq/home", "Faq:home");
$route->get("/faq/home/{page}", "Faq:home");
$route->get("/faq/channel", "Faq:channel");
$route->post("/faq/channel", "Faq:channel");
$route->get("/faq/channel/{channel_id}", "Faq:channel");
$route->post("/faq/channel/{channel_id}", "Faq:channel");
$route->get("/faq/question/{channel_id}", "Faq:question");
$route->post("/faq/question/{channel_id}", "Faq:question");
$route->get("/faq/question/{channel_id}/{question_id}", "Faq:question");
$route->post("/faq/question/{channel_id}/{question_id}", "Faq:question");

//site
$route->get("/site/home", "Site:home");
$route->get("/site/home/{page}", "Site:home");
$route->get("/site/carousel", "Site:carousel");
$route->post("/site/carousel", "Site:carousel");
$route->get("/site/carousel/{carousel_id}", "Site:carousel");
$route->post("/site/carousel/{carousel_id}", "Site:carousel");

//users
$route->get("/users/home", "Users:home");
$route->post("/users/home", "Users:home");
$route->get("/users/home/{search}/{page}", "Users:home");
$route->get("/users/user", "Users:user");
$route->post("/users/user", "Users:user");
$route->get("/users/user/{user_id}", "Users:user");
$route->post("/users/user/{user_id}", "Users:user");

//notification center
$route->post("/notifications/count", "Notifications:count");
$route->post("/notifications/list", "Notifications:list");

//END ADMIN
$route->namespace("Source\App");

/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

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

