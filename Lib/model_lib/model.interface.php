<?php
interface Imodel
{
	public function init();
	
	public function save();
	
	public function update();
	
	public function delete($id=0);
}