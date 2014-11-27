<?php

class Work extends Controller 
{
	public function index($slug = '')
	{
		$model = $this->model('WorksModel');

		if(!empty($slug)){
			$work = $model->getWork($slug);

			$this->view('work/work', array(
				"work" => $work
			));	
		}else{
			$list = $model->getList(4);

			$this->view('work/index', array(
				'title' => $model->pageTitle,
				'slogan' => $model->pageSlogan,
				'list' => $list
			));
		}
	}
}