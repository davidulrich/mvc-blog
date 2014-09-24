<?php

class AdminController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("models/admin.php");
        $this->model = new AdminModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

}

?>
