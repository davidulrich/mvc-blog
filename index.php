<?php
//require the general classes
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");
require("bootstrap.php");
//create the controller and execute the action
$loader = new Loader($_GET);
$controller = $loader->CreateController();
$controller->ExecuteAction();

//load bootstrapper
$bootstrap = new BootStrapper();
$bootstrap->Run();
?>