<?php
class ConnPool implements IconnPool
{
	private $c_max; //���������   ����Ԥ��

	private $c_index; //��¼��ǰ������״̬

	private $c_min; //��С�������������ӳس�ʼ��ʱ������

	private $dataSource;

	private $connPool; //�洢Conn ���Ӷ���

	public function __construct($dataSource,$cMin=50,$cMax=100)
	{
		$this->connPool=array();

		$this->dataSource=$dataSource;

		/**
		 * ���� cmin>cmax���
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
		//$this(); //���ù��캯����
	}
}