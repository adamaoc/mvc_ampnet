<?php

getHeader(array(
	"nav" => $data['sitenav'], 
	"headerdata" => $data['headerdata']));

getComponent("pageheader", $data['pageheader']);

getFlexView("login", $data['token']);

getFooter($data['footerdata']);

