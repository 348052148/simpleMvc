<?php
class actionIndex extends View
{
	public function __construct()
	{
		parent::__construct();
		$path='App/View/';
		$this->setTemplate($path."index.zpl");
		$this->render();
	}
}