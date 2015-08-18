<?php
interface Icontrol
{
	public function getParames($key);
	
	public function getData();
	
	public function setData($data);
	
	public function service();
	
	public function load($view);
	
}