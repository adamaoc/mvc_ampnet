<?php

class Home extends Controller 
{

	public function index()
	{
		$works = $this->model('WorksModel');
		$blogs = $this->model('BlogModel');
		$about = $this->model('AboutModel');

		$headerdata = array(
			"title" => "I am <span>Adam</span> <span>Moore</span> <small>I develop websites <span>and live in Dallas, TX</span></small>", 
			"class" => "homeheader"
		);

		$worklist = $works->getList(0,2);
		$bloglist = $blogs->getList(0,3);

		$this->view('home/index', array(
			"headerdata" => $headerdata,
			"worklist" => $worklist,
			"bloglist" => $bloglist,
			"about-text" => $about->aboutText()
		));
	}
}