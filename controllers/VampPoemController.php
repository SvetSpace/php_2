<?php
require_once "VampController.php";

class VampPoemController extends VampController {
    public $template = "vamp_poem.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $context['is_poem'] = true;

        return $context;
    }
}