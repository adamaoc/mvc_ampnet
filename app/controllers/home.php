<?php

class Home extends Controller
{

	public function index($locals = '')
	{
		$works = $this->model('WorksModel');
		$about = $this->model('AboutModel');
		$linksdata = $this->model('LinksModel');
		$sitenav = $linksdata->getSiteLinks();
		$footerdata = $linksdata->footerLinks();

		$model = array(
			"works" => $works,
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

		$pageheader = array(
			"title" => "ampnet (media)<small> Web Video - Web Development <br>Web Advertising – Social Media  <span>based in Dallas, Texas</span></small>",
			"class" => "homeheader"
		);

		$worklist = $works->getList(0,8);

		$this->view('home/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $sitenav,
			'pageheader' => $pageheader,
			'footerdata' => $footerdata,
			"worklist" => $worklist,
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

		$this->view('locals/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $model['sitenav'],
			'pageheader' => $pageheader,
			'footerdata' => $model['footerdata'],
			"worklist" => $worklist,
			"about-text" => $model['about']->aboutText(),
			"bedata" => $model['about']->beData()
		));
	}
}
