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
		
		$result=$conn->query($sql,DataBase::$RETURN_ROW);
		
		
		$this->connPool->freeConn($conn);
		
		return $result;
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
		
		$result=$conn->query($sql,DataBase::$RETURN_MUL_ROW);
		
		$this->connPool->freeConn($conn);
		
		return $result;
	}
	/**
	 * ִ�� sql
	 */
	public function execute($sql){
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql,DataBase::$NOT_RETURN);
		
		$this->connPool->freeConn($conn);
		
		return $result;
	}
	/**
	 * �����Զ������ݽṹ
	 */
	public function queryForObject($sql,$params=0,$func)
	{
		//$result=$this->query($sql);
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql,DataBase::$NOT_RETURN);
		
		$this->connPool->freeConn($conn);
		
		return call_user_method_array("getObject", $func, $params);
	}
	
	
}