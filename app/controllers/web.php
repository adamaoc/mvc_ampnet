<?php

class Web extends Controller
{
	public function index()
	{
		$about = $this->model('AboutModel');
		$linksdata = $this->model('LinksModel');
		$sitenav = $linksdata->getSiteLinks();
		$footerdata = $linksdata->footerLinks();

		$headerdata = array(
			"title" => "Freelance Web Design/Development by ampnet media - the Dallas, Texas Freelance Web Developer who is looking to help take your company get online. / Adam Moore developing in Dallas, Texas",
			"description" => "Freelance Web Design/Development by ampnetmedia - Have questions or concerns for me? Shoot me an email here and I'll get back with you as soon as possible. Give me your name, email address, city where you reside, and a detailed message here. I love hearing from my clients and potential clients, so if you have any questions or concerns please do not hesitate to contact me!"
		);

		$pageheader = array(
			"title" => "Web Design/Dev",
			"class" => "homeheader",
			"subtitle" => "<small>ampnet (media) <br>Freelance Web Design/Development</small>",
			"heroimg" => "background-image: url(/assets/img/headers/man-working-in-modern-office.jpg);"
		);

		$this->view('services/web', array(
			'headerdata' => $headerdata,
			'sitenav' => $sitenav,
			'pageheader' => $pageheader,
			'footerdata' => $footerdata,
			"about-text" => $about->aboutText(),
			"specialties" => $about->specialtiesList(),
			"bedata" => $about->beData(),
			"social-data" => $about->socialData(),
			"moreaboutText" => $about->aboutText("moreAboutText")
		));
	}
}
