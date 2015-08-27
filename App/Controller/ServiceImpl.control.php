<?php

class cServiceImpl extends Control
{
	/**
	 * 处理
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
		//echo DataSource::$RETURN_ROW;
		//echo $result['CONTENT'];
		//echo $_GET['xc'];
		//Affair::mode()->findByPk(168);
		//$r=&Affair::mode()->attribute;
		//$r['Contents']="haoba111";
		//$r['CONTENT']="经常性思想政治工作台帐";
		//Affair::mode()->update();
		//Affair::mode()->save();
		//Affair::mode()->delete(175);
		//echo $r['CONTENT'];
		//$t->setParams($a);
		$this->load(new vIndex(array(
				'data'=>'CCCNU',
				'base'=>C::app()->static
		)));
		//echo $conn->getRealConn();
// 		$string = "April 15, 2003";
// 		$pattern = "/(\w+) (\d+), (\d+)/i";
// 		$replacement = "\${1}1,\$3";
// 		print preg_replace($pattern, $replacement, $string);
		
	}
	public function doPost()
	{
		echo "doPost";
	}
}