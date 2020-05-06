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
		
		$testimonials = array(
			array(
				"author" => "Steve Smirnis", 
				"quote" => "Adam is always a consummate professional, does a great job and treats people well. He is honest, hardworking and always has a good attitude.", 
				"img" => "https://pictures.alignable.com/eyJidWNrZXQiOiJhbGlnbmFibGV3ZWItcHJvZHVjdGlvbiIsImtleSI6ImJ1c2luZXNzZXMvbG9nb3Mvb3JpZ2luYWwvNTE3NTA0NS8xNTU4Mzc2OTEzXzEyMjI3MDYzXzkzNTM3MDcyNjUyODYyMV8yOTYxMTcxMDQxMzY0NzQ1ODYyX24uanBnIiwiZWRpdHMiOnsicmVzaXplIjp7IndpZHRoIjoxODIsImhlaWdodCI6MTgyfX19", 
				"cite" => "from <a href='https://www.alignable.com/forney-tx/ampnet-media' target='_blank'>alignable</a>"
			),
			array(
				"author" => "Nathan Pennington", 
				"quote" => "Adam has such a great personality and a sincere interest in the work he does, that we quickly became friends. I watched his skills improve every single day we worked together. He's an extremely quick learner and spends any down time studying.", 
				"img" => "https://media-exp1.licdn.com/dms/image/C4D03AQEdC1R8-MRvow/profile-displayphoto-shrink_100_100/0?e=1594252800&v=beta&t=y5RP31WDZQrwdptE_YZHZARAKHihQLLBAkfzxPxuyno", 
				"cite" => "from <a href='https://www.linkedin.com/in/adammoore214/' target='_blank'>linkedin</a>"
			)
		);

		$worklist = $works->getList(0,2);

		$this->view('home/index', array(
			'headerdata' => $headerdata,
			'sitenav' => $sitenav,
			'pageheader' => $pageheader,
			'footerdata' => $footerdata,
			"worklist" => $worklist,
			"about-text" => $about->aboutText(),
			"bedata" => $about->beData(),
			'testimonial' => $testimonials
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
