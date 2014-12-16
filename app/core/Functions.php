<?php

function getComponent($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/components/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;

}

function getFlexHubComponent($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/flexhub/components/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;
	
}

function getFlexView($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/flexhub/views/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;
	
}

function getShared($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/shared/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;
}

function getHeader($data = []) {

	return getShared("header", $data);
}

function getFooter($data = []) { 

	return getShared("footer", $data);
}