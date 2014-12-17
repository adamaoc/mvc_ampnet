<?php

class Controller
{
	public function model($model)
	{
		$path = $_SERVER['DOCUMENT_ROOT'].'/app/models/'.$model.'.php';
		require_once $path;
		return new $model();
	}

	public function view($view, $data = array())
	{
		require_once '/app/views/'.$view.'.php';
	}

	public function helper($helper)
	{
		require_once '/app/helpers/'.$helper.'.php';
		return new $helper();
	}
}
