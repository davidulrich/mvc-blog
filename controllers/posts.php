<?php

class PostsController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("models/posts.php");
        $this->model = new PostsModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

    protected function view()
    {
        $this->view->output($this->model->view());
    }

    protected function summary()
    {
        $this->view->output($this->model->summary());
    }
}

?>
