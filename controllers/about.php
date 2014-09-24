<?php

class AboutController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("models/about.php");
        $this->model = new AboutModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

}

?>
