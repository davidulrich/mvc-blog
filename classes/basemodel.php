<?php

require("classes/db.php");

class BaseModel extends DBConnect{
    
    protected $viewModel;

    //create the base and utility objects available to all models on model creation
    public function __construct()
    {
        $this->viewModel = new ViewModel();
		
		$this->commonViewData();
		
		session_start();

		//for use on production only...
		//error_reporting(0);

		date_default_timezone_set('America/Los_Angeles');

    }
	
	//establish viewModel data that is required for all views in this method (i.e. the main template)
    protected function commonViewData() {
	
		//e.g. $this->viewModel->set("mainMenu",array("Home" => "/home", "Help" => "/help"));
	}

	protected function notify($msg) {
		$_SESSION['global_message'] = $msg;
	}

	protected function clear_notify() {
		unset($_SESSION['global_message']);
	}
}

?>
