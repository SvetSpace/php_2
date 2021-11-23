<?php
require_once "VampController.php"; 

class VampImageController extends VampController {
    public $template = "vamp_image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['image'] = "/images/vamp.jpg";
        $context['is_image'] = true;

        return $context;
    }
}