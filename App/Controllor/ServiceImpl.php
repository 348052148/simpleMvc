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
		$sql=SqlTemplate::getInstance();
		$result=$sql->queryForRow("select * from affair");

		echo $result['CONTENT'];
		
		//echo $conn->getRealConn();
		
	}
	public function doPost()
	{
		echo "doPost";
	}
}