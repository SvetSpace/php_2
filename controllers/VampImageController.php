<?php
require_once "VampController.php"; 

class VampImageController extends VampController {
    public $template = "vamp_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['is_image'] = $context['url'] == "/vamp/image";
        $context['url_image'] = "/vamp/image";
        $context['image'] = "/images/vamp.jpg";
        $context['is_image'] = true;

        return $context;
    }
}