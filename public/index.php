
<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];


$title = "";
$template = "";

$context = [];
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

$context['title'] = $title;
$context['menu'] = $menu;

echo $twig->render($template, $context);
