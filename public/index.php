
<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php"; // добавим ссылку на наш контроллер
require_once "../controllers/VampController.php";
require_once "../controllers/VampImageController.php";
require_once "../controllers/VampInfoController.php";
require_once "../controllers/VampPoemController.php";
require_once "../controllers/WerewolfImageController.php";
require_once "../controllers/WerewolfInfoController.php";
require_once "../controllers/WerewolfPoemController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];


$title = "";
$template = "";

$context = [];
$controller = new Controller404($twig); // создаем переменную под контроллер (404 по умолчанию)
$menu = [
  [
    "title" => "Главная",
    "url" => "/",
  ],
  [
    "title" => "Вампир",
    "url" => "/vamp",
  ],
  [
    "title" => "Оборотень",
    "url" => "/werewolf",
  ]
];

if ($url == "/") {  
  $controller = new MainController($twig); // создаем экземпляр контроллера для главной страницы

  }elseif (preg_match("#^/vamp/image#", $url)) {
    $controller = new VampImageController($twig);
  } elseif (preg_match("#^/vamp/info#", $url)) {    
    $controller = new VampInfoController($twig);
  } elseif (preg_match("#^/vamp/poem#", $url)) {    
    $controller = new VampPoemController($twig);    
  } elseif (preg_match("#^/vamp#", $url)) {
    $controller = new VampController($twig);

  } elseif (preg_match("#^/werewolf/image#", $url)) {
    $controller = new WerewolfImageController($twig);
  } elseif (preg_match("#^/werewolf/info#", $url)) {
    $controller = new WerewolfInfoController($twig);
  } elseif (preg_match("#^/werewolf/poem#", $url)) {
    $controller = new WerewolfPoemController($twig);    
  } elseif (preg_match("#^/werewolf#", $url)) {  
  $controller = new WerewolfController($twig);
}
// проверяем если controller не пустой, то рендерим страницу
if ($controller) {
  $controller->get();
}