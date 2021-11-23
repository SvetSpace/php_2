<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class VampController extends TwigBaseController {
    public $template = "vamp__object.twig";
    public $title = "Вампир";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['url_image'] = "/vamp/image";
        $context['url_info'] = "/vamp/info";
        $context['url_poem'] = "/vamp/poem";

        return $context;
    }
}