<?php

class ServiceImpl extends Control
{
	/**
	 * ´¦Àí
	 * @see Control::doGet()
	 */
	public function doGet()
	{
		$session=$this->getSession();
		$session->setSession("dom", "helloworld");
		//echo "doGet".$this->getParames('xm');
		//echo $session->getSession("dom")."</br>";
		//$sql=SqlTemplate::getInstance();
		//$result=$sql->queryForRow("select * from affair");

		//echo $result['CONTENT'];
		//echo $_GET['xc'];
		Affair::mode()->findByPk(12);
		$r=Affair::mode()->attribute;
		echo $r['CONTENT'];
		//$this->load(new actionIndex());
		//echo $conn->getRealConn();
		
	}
	public function doPost()
	{
		echo "doPost";
	}
}