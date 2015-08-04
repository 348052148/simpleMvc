<?php
class ConnPool implements IconnPool
{
	private $c_max; //最大连接数   超出预警

	private $c_index; //记录当前连接数状态

	private $c_min; //最小连接数。既连接池初始化时的连接

	private $dataSource;

	private $connPool; //存储Conn 连接对象

	public function __construct($dataSource,$cMin=50,$cMax=100)
	{
		$this->connPool=array();

		$this->dataSource=$dataSource;

		/**
		 * 处理 cmin>cmax情况
		 */
		if($cMin>=$cMax)
		{
			$cMax=$cMin+30;
		}
		$this->c_min=$cMin;
		$this->c_max=$cMax;

		for($i=0;$i<$this->c_min;$i++)
		{
				
			array_push($this->connPool, new Conn($this->dataSource));
		}

	}

	public function setGetPoolFlag($f)
	{

	}

	public function getConn()
	{
		return array_pop($this->connPool);
	}

	public function freeConn($conn)
	{
		array_push($this->connPool, $conn);
	}

	public function updateConnPool()
	{
		//$this(); //调用构造函数。
	}
}