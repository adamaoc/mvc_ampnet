<?php

class Flex_admin extends Controller 
{
	public $session = '';
	public $input = '';
	public $token = '';
	public $sitedata = array();
	public $loggedin = false;

	public function __construct()
	{
		$this->sitedata = $this->buildSiteData();
		$this->loggedin = $this->login();

	}

	public function index()
	{
		$viewpath = "flexhub/index";

		var_dump($this->loggedin);
		if($this->loggedin) {
			$viewpath = "flexhub/dashboard";
		}

		$this->view($viewpath, array(
			'headerdata' => $this->sitedata['headerdata'],
			'sitenav' => $this->sitedata['sitenav'],
			'pageheader' => $this->sitedata['pageheader'],
			'footerdata' => $this->sitedata['footerdata'],
			'token' => $token
		));
	}

	public function buildSiteData()
	{
		$linksdata = $this->model('linksModel');
		$sitenav = $linksdata->getSiteLinks();
		$footerdata = $linksdata->footerLinks();

		$headerdata = array(
			"title" => "Backend - No Index...",
			"description" => ""
		);

		$pageheader = array(
			"title" => "FlexHub", 
			"class" => "page-header", 
			"subtitle" => "<small>ampnet(<span>media</span>)</small>", 
			"heroimg" => "background-image: url(/assets/img/home-banner.jpg);"
		);

		return $this->sitedata = array(
			"sitenav" => $sitenav,
			"footerdata" => $footerdata,
			"headerdata" => $headerdata,
			"pageheader" => $pageheader
		);
	}

	public function login()
	{
		$loggedin = false;

		if(!empty($_POST)) {
			// ************************
			// TODO :: move this out --
			// ************************
			$username = $_POST['username'];
			$password = $_POST['password'];

			if($username == "admin") {
				if($password == "test") {
					$loggedin = true;
				}
			}
		}

		return $loggedin;
	}

}