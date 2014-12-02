<?php

class Work extends Controller 
{

	public function index($slug = '', $pagenum = '')
	{
		$model = $this->model('WorksModel');

		if(!empty($slug)){
			if($slug == "page") {
				$this->getPages($model, $pagenum);
			}else{
				$this->getSingle($model, $slug);
			}
		}else{
			$pagenum = 1;
			$this->getPages($model, $pagenum);
		}
	}

	private function getSingle($model, $slug)
	{
		$post = $model->getPost($slug);
		
		$headerdata = array(
			"title" => $post['title'], 
			"class" => "page-header", 
			"subtitle" => $post['subtitle'], 
			"heroimg" => "background-image: url(/assets/img/".$post['imglg'].");", 
			"postcolor" => "background-color: ".$post['color'].";"
		);

		$this->view('work/single', array(
			'headerdata' => $headerdata,
			'title' => $model->pageTitle,
			'slogan' => $model->pageSlogan,
			"post" => $post
		));	
	}

	private function getPages($model, $pagenum)
	{
		$numPosts = $model->getNumbPosts();
		$countby = 4;
		$nextpage = $pagenum + 1;
		$prevpage = $pagenum -1;
		$maxpagecount = ceil($numPosts / $countby);
		// Do more maths to make this happen :\
		if($pagenum == 1) {
			$minpage = 0;
			$maxpage = 4;
		}elseif($pagenum == 2) {
			$minpage = 4;
			$maxpage = 8;
		}elseif($pagenum == 3) {
			$minpage = 8;
			$maxpage = 12;
		}elseif($pagenum == 4) {
			$minpage = 12;
			$maxpage = 16;
		}

		if($maxpage > $numPosts) {
			$maxpage = $numPosts;
		}

		$list = $model->getList($minpage,$maxpage);

		$headerdata = array(
			"title" => "Portfolio", 
			"subtitle" => "<small>by ampnet<span>(media)</span></small>", 
			"class" => "page-header",
			"heroimg" => "background-image: url(/assets/img/home-banner.jpg);"
		);

		$this->view('work/index', array(
			'headerdata' => $headerdata,
			'title' => $model->pageTitle,
			'slogan' => $model->pageSlogan,
			'list' => $list,
			'nextpage' => $nextpage,
			'prevpage' => $prevpage,
			'maxpagecount' => $maxpagecount
		));
	}

	public function fulllist()
	{
		$model = $this->model('WorksModel');
		$numPosts = $model->getNumbPosts();
		$list = $model->getList(0,$numPosts);

		$this->view('work/fulllist', array(
			"post" => $list
		));	
	}
}