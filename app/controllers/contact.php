<?php

class Contact extends Controller 
{
	public function index()
	{
		$headerdata = array(
			"title" => "Contact", 
			"class" => "page-header", 
			"subtitle" => "<small>ampnet(<span>media</span>)</small>", 
			"heroimg" => "background-image: url(/assets/img/baseballfield-header-lg.jpg);"
		);

		$this->view('contact/index', array(
			'headerdata' => $headerdata
		));
	}
}