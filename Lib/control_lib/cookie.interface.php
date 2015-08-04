<?php
interface Icookie
{
	public function setCookie($key,$val);
	
	public function removeCookie($key);
	
	public function getCookieState();
	
}