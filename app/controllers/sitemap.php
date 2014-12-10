<?php

class Sitemap extends Controller 
{
	public $pages = '';

	public function __construct() 
	{
		$data = scandir('app/controllers/');
		unset($data[0]);
		unset($data[1]);
		$pages = array();
		foreach ($data as $single) {
			$page = explode('.', $single);
			
			if($page[0] != "sitemap") {
				$pages[] = $page[0];
				if($page[0] == "blog") {
					$internals = $this->getInternalsBlog('BlogModel');
					$pages['blogs'] = $internals;
				}
				if($page[0] == "work") {
					$internals = $this->getInternalsWorks('WorksModel');
					$pages['works'] = $internals;
				}
			} 
		}
		$locals = $this->getLocals('LocalsModel');
		$pages['locals'] = $locals;

		$this->pages = $pages;
	}

	public function index()
	{
		$linksdata = $this->model('linksModel');
		$sitenav = $linksdata->getSiteLinks();
		$footerdata = $linksdata->footerLinks();

		$headerdata = array(
			"title" => "Sitemap | Explore ampnetmedia from our easily accessable Site Map.",
			"description" => "This is the Sitemap for ampnet media."
		);

		$pageheader = array(
			"title" => "Sitemap", 
			"class" => "page-header", 
			"subtitle" => "<small>ampnet(<span>media</span>)</small>", 
			"heroimg" => "background-image: url(/assets/img/baseballfield-header-lg.jpg);"
		);
		$this->view('sitemap/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $sitenav,
			'pageheader' => $pageheader,
			'footerdata' => $footerdata,
			"pages" => $pages
		));
	}

	public function xml()
	{
		$pages = $this->pages;

		$this->view('sitemap/xml', array(
			"pages" => $pages
		));
	}

	protected function getInternalsWorks($model)
	{
		$model = $this->requireModel($model);

		$works = $model->getAllPosts();
		$worksarr = array();
		foreach ($works as $work) {
			$slug = $work['slug'];
			$worksarr[$slug] = array(
				"url" => "work/".$slug,
				"name" => $work['title']
			);
		}
		return $worksarr;
	}

	protected function getInternalsBlog($model)
	{
		$model = $this->requireModel($model);

		$blogs = $model->getAllPosts();
		$blogarr = array();
		foreach ($blogs as $blog) {
			$slug = $blog['slug'];
			$blogsarr[$slug] = array(
				"url" => "blog/".$slug,
				"name" => $blog['title']
			);
		}
		return $blogsarr;
	}

	protected function getLocals($model)
	{
		$model = $this->requireModel($model);
		$locals = $model->legacyLocals();

		return $locals;
	}

	private function requireModel($model)
	{
		$url = "app/models/".$model.".php";
		require_once $url;
		$model = new $model;

		return $model;
	}
}