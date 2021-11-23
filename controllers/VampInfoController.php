<?php
require_once "VampController.php";

class VampInfoController extends VampController {
    public $template = "vamp_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $context['is_info'] = true;

        return $context;
    }
}