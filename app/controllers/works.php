<?php

class Works extends Controller 
{
	public function index()
	{
		$model = $this->model('WorksModel');
		$list = $model->getList(4);

		$this->view('work/index', array(
			'title' => $model->pageTitle,
			'slogan' => $model->pageSlogan,
			'list' => $list
		));
	}

	public function work($slug = '')
	{
		$model = $this->model('WorksModel');
		$work = $model->getWork($slug);

		$this->view('work/work', array(
			"work" => $work
		));
	}
}