<?php
interface Isession
{
	public function setSession($key,$val);
	
	public function getSession($key);
	
	public function destroySession($key);
	
	public function removeSession($key);
	
	public function startSession();
	
	public function stopSession();
}