<?php

class Home extends Controller 
{

	public function index()
	{
		$model = $this->model('WorksModel');
		$numposts = $model->getNumbPosts();
		$startnum = $numposts - 3;
		$list = $model->getList($startnum,$numposts);

		$this->view('home/index', array(
			"list" => $list
		));
	}
}