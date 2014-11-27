<?php

class WorksModel 
{
	public $pageTitle = "Portfolio";
	public $pageSlogan = "DFW Web Development and Design";
	public $pageContent = "Here is some standard text for the portfolio page.";

	public $workslistarr = array();

	public function getNumbPosts()
	{

	}

	public function getList($num)
	{
		$api = $_SERVER['DOCUMENT_ROOT'].'/data/works/works.json';
		
		$data = json_decode(file_get_contents($api));

		$buildarr = array();

		for($i = 0; $i < $num; ++$i) {
			foreach ($data->posts[$i]->tags as $tag) :
				$tagarr[] = $tag;
			endforeach;
			$buildarr[] = array(
				"title" => $data->posts[$i]->title,
				"slug" => $data->posts[$i]->slug,
				"category" => $data->posts[$i]->category,
				"pubdate" => $data->posts[$i]->pubdate,
				"imgthumb" => $data->posts[$i]->images->thumb,
				"excerpt" => $data->posts[$i]->excerpt,
				"tags" => $tagarr
			);
		}

		$this->workslistarr = $buildarr;
		return $buildarr;
	}

	public function getWork($slug)
	{
		$api = $_SERVER['DOCUMENT_ROOT'].'/data/works/works.json';
		
		$data = json_decode(file_get_contents($api));

		$postarr = array();

		foreach ($data->posts as $post) {
			if($post->slug == $slug) {
				$postarr = $post;
			}
		}

		if(empty($postarr)) {
			// should redirect to a 404 page... 
			echo "404";
		}else{
			return $postarr;
		}

	}
}
