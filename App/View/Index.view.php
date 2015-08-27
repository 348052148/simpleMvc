<?php
class vIndex extends View
{
	public function __construct($params=array())
	{
		parent::__construct($params);
		$path='App/View/';
		$this->setTemplate($path."index.zpl");
	}
	public function filter($data){
		
		return $data;
	}
}