<?php

class Home extends Controller 
{

	public function index()
	{
		$model = $this->model('WorksModel');
		$list = $model->getList(3);

		$this->view('home/index', array(
			"list" => $list
		));
	}
}