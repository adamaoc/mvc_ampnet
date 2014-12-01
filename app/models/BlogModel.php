<?php

class BlogModel 
{
	public $pageTitle = "Bloging";
	public $pageSlogan = "DFW Web Development and Design";
	public $pageContent = "Here is some standard text for the portfolio page.";

	public $blogdir = "./data/blogs/posts/";

	public $workslistarr = array();

	public function getNumbPosts()
	{
		$api = $_SERVER['DOCUMENT_ROOT'].'/data/blogs/blogs.json';
		
		$data = json_decode(file_get_contents($api));
		
		return count($data->posts);	
	}

	public function getList($startnum, $endnum)
	{
		if($handle = opendir($this->blogdir)) 
		{
			
		}
		// $api = $_SERVER['DOCUMENT_ROOT'].'/data/blogs/blogs.json';
		
		// $data = json_decode(file_get_contents($api));

		// $buildarr = array();

		// for($i = $startnum; $i < $endnum; ++$i) {
		// 	foreach ($data->posts[$i]->tags as $tag) :
		// 		$tagarr[] = $tag;
		// 	endforeach;
		// 	$buildarr[] = array(
		// 		"title" => $data->posts[$i]->title,
		// 		"slug" => $data->posts[$i]->slug,
		// 		"category" => $data->posts[$i]->category,
		// 		"pubdate" => $data->posts[$i]->pubdate,
		// 		"imgthumb" => $data->posts[$i]->images->thumb,
		// 		"excerpt" => $data->posts[$i]->excerpt,
		// 		"tags" => $tagarr
		// 	);
		// }

		// $this->workslistarr = $buildarr;
		// return $buildarr;
	}

	public function getPost($slug)
	{


		// $api = $_SERVER['DOCUMENT_ROOT'].'/data/blogs/blogs.json';
		
		// $data = json_decode(file_get_contents($api));

		// $postarr = array();

		// foreach ($data->posts as $post) {
		// 	if($post->slug == $slug) {
		// 		$postarr = $post;
		// 	}
		// }

		// if(empty($postarr)) {
		// 	// should redirect to a 404 page... 
		// 	echo "404";
		// }else{
		// 	return $postarr;
		// }

	}
}
