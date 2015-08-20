<?php
/**
 * 本类提供 数据获取或更新的 直接操作。。
 * 要求：
 * 1.进行sql 验证
 * 2.防止sql 注入
 * 3.统一的接口。
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
			获取 connPool 连接池
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
	 * 返回 数据库查询的一列数据
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
	 * 返回查询的多列数据
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
	public function execute($sql){
		$conn=$this->connPool->getConn();
		
		$result=$conn->query($sql);
		
		$this->connPool->freeConn($conn);
		
		return $result;
	}
	/**
	 * 返回自定义数据结构
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