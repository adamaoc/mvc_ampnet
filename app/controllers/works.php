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
}