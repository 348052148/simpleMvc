<?php
/**
 * �����ṩ ���ݻ�ȡ����µ� ֱ�Ӳ�������
 * Ҫ��
 * 1.����sql ��֤
 * 2.��ֹsql ע��
 * 3.ͳһ�Ľӿڡ�
 * @author Administrator
 *
 */
class SqlTemplate
{
	private $connPool;
	
	private static $sqlTemplate=null;
	
	private function __construct()
	{
		/**
			��ȡ connPool ���ӳ�
		 */
		$this->connPool=ConnPoolFactory::getConnPool();
	}
	public static function getInstance()
	{
		if(self::$sqlTemplate==null)
		{
			self::$sqlTemplate=new SqlTemplate();
		}
		return self::$sqlTemplate;
	}
	/**
	 * ���� ���ݿ��ѯ��һ������
	 * @param unknown $sql
	 * @return $obj:
	 */
	public function queryForRow($sql,$params=0)
	{
		
	//	$result=$this->query($sql);
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql);
		
		
		$this->connPool->freeConn($conn);
		
		if($row=mysql_fetch_assoc($result))
			return $row;
		
		return false;
	}
	/**
	 * ���ز�ѯ�Ķ�������
	 * @param unknown $sql
	 * @param number $parames
	 */
	public function queryForList($sql,$params=0)
	{
		//$result=$this->query($sql);
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql);
		
		$this->connPool->freeConn($conn);
		
		$list=array();
		while($row=mysql_fetch_assoc($result))
		{
			array_push($list, $row);
		}
		return $list;
	}
	/**
	 * �����Զ������ݽṹ
	 */
	public function queryForObject($sql,$params=0,$func)
	{
		//$result=$this->query($sql);
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql);
		
		$this->connPool->freeConn($conn);
		
		return call_user_method_array("getObject", $func, $params);
	}
	
	
}