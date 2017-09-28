<?php

class Home extends Controller 
{

	public function index($locals = '')
	{
		$works = $this->model('WorksModel');
		$blogs = $this->model('BlogModel');
		$about = $this->model('AboutModel');
		$linksdata = $this->model('LinksModel');
		$sitenav = $linksdata->getSiteLinks();
		$footerdata = $linksdata->footerLinks();

		$model = array(
			"works" => $works,
			"blogs" => $blogs,
			"about" => $about,
			"linksdata" => $linksdata,
			"sitenav" => $sitenav,
			"footerdata" => $footerdata,
			"local" => $locals
		);

		if(!empty($locals)) {
			if($this->checkLocals($locals) == true) {
				$this->renderLocals($model);
				die;
			}
		}

		$headerdata = array(
			"title" => "Home Page of ampnet media - the Dallas, Texas Freelance Web Development – Web Video – Web Advertising – Social Media / Adam Moore - Dallas, Texas",
			"description" => $about->aboutText()
		);
//"title" => "I am <span>Adam</span> <span>Moore</span> <small>I develop websites <span>and live in Dallas, TX</span></small>", 

		$pageheader = array(
			"title" => "This is <span>ampnet (media)</span><small>Web Development – Web Video – Web Advertising – Social Media  <span> in Dallas, Texas</span></small>",
			"class" => "homeheader"
		);

		$worklist = $works->getList(0,2);
		$bloglist = $blogs->getList(0,6);

		$this->view('home/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $sitenav,
			'pageheader' => $pageheader,
			'footerdata' => $footerdata,
			"worklist" => $worklist,
			"bloglist" => $bloglist,
			"about-text" => $about->aboutText(),
			"bedata" => $about->beData()
		));
	}

	private function checkLocals($local)
	{
		// checks for legacy local urls
		$model = $this->model('LocalsModel');
		$legacy = $model->legacyLocals();

		if(in_array($local, $legacy)) {
			return ture;
		}

		return false;
	}

	private function renderLocals($model)
	{

		$local = explode("-", $model['local']);
		$city = $local[0];
		$state = $local[1];
		$innear = 'near';
		if($city == 'forney' || $city == 'dallas') {
			$innear = 'in';
		}

		$headerdata = array(
			"title" => "Home Page of ampnetmedia - the Dallas, Texas Freelance Web Development – Web Video – Web Advertising – Social Media  / Adam Moore - Dallas, Texas",
			"description" => ""
		);

		$pageheader = array(
			"title" => $city.', '.$state."<span>ampnet</span> <span>media</span> <small>Web Development – Web Video – Web Advertising – Social Media  <span> ".$innear." ".$city.', '.$state."</span></small>", 
			"class" => "homeheader"
		);

		$worklist = $model['works']->getList(0,4);
		$bloglist = $model['blogs']->getList(0,6);

		$this->view('locals/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $model['sitenav'],
			'pageheader' => $pageheader,
			'footerdata' => $model['footerdata'],
			"worklist" => $worklist,
			"bloglist" => $bloglist,
			"about-text" => $model['about']->aboutText(),
			"bedata" => $model['about']->beData()
		));
	}
}
