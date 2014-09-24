<?php

class AboutModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","Sift & Social | About");
        return $this->viewModel;
    }

}

?>
