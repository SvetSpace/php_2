
<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php"; // добавим ссылку на наш контроллер

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];


$title = "";
$template = "";

$context = [];
$controller = null; // создаем переменную под контроллер
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
  $title = "Главная";
  $template = "main.twig";
  $controller = new MainController($twig); // создаем экземпляр контроллера для главной страницы
} elseif (preg_match("#^/vamp#", $url)) {
  $title = "Вампир";
  $template = "vamp__object.twig";

  if (preg_match("#^/vamp/image#", $url)) {
    $template = "vamp_image.twig";
    $context['image'] = "/images/vamp.jpg";
    $context['is_image'] = true;
  } elseif (preg_match("#^/vamp/info#", $url)) {
    $template = "vamp_info.twig";
    $context['is_info'] = true;
  } elseif (preg_match("#^/vamp/poem#", $url)) {
    $template = "vamp_poem.twig";
    $context['is_poem'] = true;
  }

} elseif (preg_match("#^/werewolf#", $url)) {  
  $title = "Оборотень";
  $template = "werewolf__object.twig";

  if (preg_match("#^/werewolf/image#", $url)) {
    $template = "werewolf_image.twig";
    $context['image'] = "/images/werewolf.jpg";
    $context['is_image'] = true;
  } elseif (preg_match("#^/werewolf/info#", $url)) {
    $template = "werewolf_info.twig";
    $context['is_info'] = true;
  } elseif (preg_match("#^/werewolf/poem#", $url)) {
    $template = "werewolf_poem.twig";
    $context['is_poem'] = true;
  }
}
// проверяем если controller не пустой, то рендерим страницу
if ($controller) {
  $controller->get();
}