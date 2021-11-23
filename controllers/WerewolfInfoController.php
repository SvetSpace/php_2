<?php
require_once "WerewolfController.php"; 

class WerewolfInfoController extends WerewolfController {
    public $template = "werewolf_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_info'] = true;

        return $context;
    }
}