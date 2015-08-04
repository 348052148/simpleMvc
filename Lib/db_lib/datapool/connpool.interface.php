<?php
interface IconnPool
{
	
	public function setGetPoolFlag($f);
	
	public function getConn();
	
	public function freeConn($conn);
	
	public function updateConnPool();
	
}