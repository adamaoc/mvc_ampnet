<?php

class About extends Controller 
{
	public function index()
	{
		$headerdata = array(
			"title" => "about", 
			"class" => "page-header", 
			"subtitle" => "<small>ampnet(<span>media</span>)</small>", 
			"heroimg" => "background-image: url(/assets/img/home-banner.jpg);"
		);
		
		$this->view('about/index', array(
			'headerdata' => $headerdata
		));
	}
}