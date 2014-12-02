<?php

class Home extends Controller 
{

	public function index()
	{
		$works = $this->model('WorksModel');
		$blogs = $this->model('BlogModel');
		$worksnumposts = $works->getNumbPosts();
		$blognumposts = $blogs->getNumbPosts();

		$headerdata = array(
			"title" => "I am <span>Adam</span> <span>Moore</span> <small>I develop websites <span>and live in Dallas, TX</span></small>", 
			"class" => "homeheader"
		);

		$workstartnum = $worksnumposts - 3;
		$blogstartnum = $blognumposts - 3;
		$worklist = $works->getList($workstartnum,$worksnumposts);
		$bloglist = $blogs->getList($blogstartnum,$blognumposts);

		$this->view('home/index', array(
			"headerdata" => $headerdata,
			"worklist" => $worklist,
			"bloglist" => $bloglist
		));
	}
}