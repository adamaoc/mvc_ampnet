<?php

function getComponent($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/components/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;

}

function getShared($file, $data = []) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/shared/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;
}

function getHeader($options = []) {

	return getShared("header");
}

function getFooter($options = []) { 

	return getShared("footer");
}