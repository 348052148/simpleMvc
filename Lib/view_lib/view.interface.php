<?php
interface Iview
{
	public function render();
	
	public function setParams($params);
	
	public function setTemplate($template);
}