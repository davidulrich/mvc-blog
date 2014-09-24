<?php

class PostsModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
    	$db = new DBConnect();
    	$p = $db->pquery("SELECT title,category,slug FROM `posts` WHERE published=1 GROUP BY category ORDER BY date DESC",null);
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
    	$this->viewModel->set("art",$art);
    	$this->viewModel->set("biz",$biz);
    	$this->viewModel->set("tech",$tech);
        $this->viewModel->set("pageTitle","Philosophic Wolf | Posts");
        return $this->viewModel;
    }

    public function view()
    {   
    	$db = new DBConnect();
    	$s = $db->pquery("SELECT
                        (SELECT GROUP_CONCAT(chapter SEPARATOR ',') FROM pages AS c WHERE c.ref=posts.id AND c.chapter != '') AS chapter,
                        (SELECT GROUP_CONCAT(page SEPARATOR ',') FROM pages AS cp WHERE cp.ref=posts.id AND cp.chapter != '') AS chapter_page,
                         posts.id,posts.title,pages.content,pages.page,posts.slug,pages.chapter AS cur_chapter,posts.pages,summary FROM posts
    					 LEFT JOIN pages ON (pages.ref = posts.id)
    					 WHERE slug=? AND page BETWEEN ? AND ?+1",array($_REQUEST['action'],intval($_REQUEST['id']),intval($_REQUEST['id'])));
        if(empty($s[1]['content'])) {
            //get comments
            $c = $db->pquery("SELECT
                            (SELECT id FROM posts s WHERE s.id=posts.id) AS id,
                            name,body,comments.date FROM comments
                            RIGHT JOIN posts ON (posts.id = comments.ref)
                            WHERE posts.slug=?",array($_REQUEST['action']));
            $this->viewModel->set("comments",$c);
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
            $this->viewModel->set("art",$art);
            $this->viewModel->set("biz",$biz);
            $this->viewModel->set("tech",$tech);
        }
        
        if(isset($s[0]['chapter'])) {
            $data = array();
            $chapters = explode(",",$s[0]['chapter']);
            $pages = explode(",",$s[0]['chapter_page']);
            for($i=0;$i<count($chapters);$i++) {
                array_push($data,array($pages[$i] => $chapters[$i]));
            }
            $s[0]['chapters'] = $data;
        }

    	$this->viewModel->set("content",$s);
        if(isset($s[0]['title'])) {
            $this->viewModel->set("pageTitle",$s[0]['title']." | Philosophic Wolf");
        } else {
            $this->viewModel->set("pageTitle","Comments | Philosophic Wolf");
        }
        
        return $this->viewModel;
    }

    public function summary()
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

    	$s = $db->pquery("SELECT title,summary,date,pages,slug FROM posts WHERE slug=?",array($_REQUEST['action']));

    	if(!empty($s[0]['title'])) {
    		$this->viewModel->set("content",$s);
    	}
    	$this->viewModel->set("art",$art);
    	$this->viewModel->set("biz",$biz);
    	$this->viewModel->set("tech",$tech);
        $this->viewModel->set("pageTitle",$s[0]['title']." | Philosophic Wolf");
        return $this->viewModel;
    }
}

?>
