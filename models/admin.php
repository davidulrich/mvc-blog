<?php

class AdminModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
    	$db = new DBConnect();
        $this->viewModel->set("pageTitle","Philosophic Wolf | Admin");

        $posts = $db->pquery("SELECT id,title FROM posts",null);
        $this->viewModel->set("posts",$posts);
        return $this->viewModel;
    }

}

?>
