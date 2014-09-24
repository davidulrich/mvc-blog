<?php

class HomeModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
    	$db = new DBConnect();

    	$p = $db->pquery("SELECT title,category,slug FROM `posts` WHERE published=1 ORDER BY date DESC",null);
    	$art = $biz = $tech = array();
    	for($i=0;$i<count($p);$i++) {
    		switch($p[$i]['category']) {
    			case 'business':
	    			$data = array("title" => $p[$i]['title'],"slug"=>$p[$i]['slug']);
	    			array_push($biz,$data);
    			break;
    			case 'technology':
	    			$data = array("title" => $p[$i]['title'],"slug"=>$p[$i]['slug']);
	    			array_push($tech,$data);
    			break;
    			case 'art':
	    			$data = array("title" => $p[$i]['title'],"slug"=>$p[$i]['slug']);
	    			array_push($art,$data);
    			break;
    		}
    	}

        $f = $db->pquery("SELECT id,title,category,slug,pic FROM `posts` WHERE published=1 ORDER BY rand() LIMIT 1",null);
    	$this->viewModel->set("art",$art);
    	$this->viewModel->set("biz",$biz);
    	$this->viewModel->set("tech",$tech);
        $this->viewModel->set("featured",$f);
        $this->viewModel->set("pageTitle","Philosophic Wolf");
        return $this->viewModel;
    }

}

?>
