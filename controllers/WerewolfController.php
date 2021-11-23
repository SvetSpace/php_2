<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class WerewolfController extends TwigBaseController {
    public $template = "werewolf__object.twig";
    public $title = "Оборотень";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['url_image'] = "/werewolf/image";
        $context['url_info'] = "/werewolf/info";
        $context['url_poem'] = "/werewolf/poem";

        return $context;
    }
}