<?php
require_once "WerewolfController.php"; 

class WerewolfImageController extends WerewolfController {
    public $template = "vamp_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_image'] = $context['url'] == "/werewolf/image";
        $context['url_image'] = "/werewolf/image";
        $context['image'] = "/images/werewolf.jpg";
        $context['is_image'] = true;

        return $context;
    }
}