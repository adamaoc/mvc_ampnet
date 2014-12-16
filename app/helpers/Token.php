<?php

class Token 
{

	public static function generate() 
	{
		return Session::put('token', md5(uniqid()));
	}

	public static function check($token) 
	{
		// $tokenName = Config::get('session/token_name');
		$tokenName = "this";
		if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}

		return false;
	}
}