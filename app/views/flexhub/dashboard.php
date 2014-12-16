<?php

getHeader(array(
	"nav" => $data['sitenav'], 
	"headerdata" => $data['headerdata']));

getComponent("pageheader", $data['pageheader']);

getFlexView("dashboard");

getFooter($data['footerdata']);

