<?php

class ServiceImpl extends Control
{
	/**
	 * ����
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
		$this->load(new actionIndex());
		//echo $conn->getRealConn();
		
	}
	public function doPost()
	{
		echo "doPost";
	}
}