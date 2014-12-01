<?php

class Home extends Controller 
{

	public function index()
	{
		$works = $this->model('WorksModel');
		$blogs = $this->model('BlogModel');
		$worksnumposts = $works->getNumbPosts();
		$blognumposts = $blogs->getNumbPosts();

		$workstartnum = $worksnumposts - 3;
		$blogstartnum = $blognumposts - 3;
		$worklist = $works->getList($workstartnum,$worksnumposts);
		$bloglist = $blogs->getList($blogstartnum,$blognumposts);

		$this->view('home/index', array(
			"worklist" => $worklist,
			"bloglist" => $bloglist
		));
	}
}