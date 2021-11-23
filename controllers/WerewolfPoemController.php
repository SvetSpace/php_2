<?php
require_once "WerewolfController.php"; 

class WerewolfPoemController extends WerewolfController {
    public $template = "werewolf_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_poem'] = true;

        return $context;
    }
}