<?php
require_once "WerewolfController.php"; 

class WerewolfImageController extends WerewolfController {
    public $template = "vamp_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['image'] = "/images/werewolf.jpg";
        $context['is_image'] = true;

        return $context;
    }
}