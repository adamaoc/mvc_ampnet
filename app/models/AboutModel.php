<?php

class AboutModel
{
	public $dataroot = "data/pages/";

	public function aboutText()
	{
		$api = $this->dataroot."about-data.json";
		$data = file_get_contents($api);
		$data = json_decode($data);
		// print_r($data->aboutText);
		return $data->aboutText;
	}
}