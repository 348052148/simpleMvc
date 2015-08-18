<?php
/**
 * 装饰模式？？？ 对conn进行了简单的包装。
 * @author Administrator
 *1.对每个连接数进行计数
 *2.对连接的字符集设置
 *3.对连接的的数据库设置
 *4.事务操作等..
 */
class Conn implements Iconn
{
	private $dataSource;
	
	private $c_count; //计算器。计算本连接被使用次数。
	
	private $c_max; //计算本连接 最大使用次数。 (不知道一个资源类型使用久了会不会导致资源变慢的一系列问题)
	
	private $realConn;
	
	private $dbName;
	
	private $character;
	
	public function __construct($dataSource)
	{
		$this->dataSource=$dataSource;
		$this->c_count=0;
		$this->c_max=0;
		$this->realConn=$this->dataSource->getConn();
		
		$this->dbName=$this->dataSource->getDbName();
		
		$this->character=$this->dataSource->getCharacter();
		/**
		 * 选择 具体数据库。默认从数据源继承
		 */
		mysql_select_db($this->dbName,$this->realConn);
		
		/**
		 * 设置 连接的字符集 默认从数据源继承
		 */
		mysql_query("set names '$this->character'",$this->realConn);
		//mysql_query("set names 'gbk'",$this->realConn);
	}
	
	/**
	 * 获取真实连接
	 * @see Iconn::getRealConn()
	 */
	public function getRealConn()
	{
		$this->c_count++;
		
		return $this->realConn;
	}
	/**
	 * 真正的释放conn资源
	 * @see Iconn::freeConn()
	 */
	public function freeConn()
	{
		mysql_close($this->realConn);
	}
	/**
	 * 数据连接，提供查询功能。
	 * @see Iconn::query()
	 */
	public function query($sql)
	{
		return $this->dataSource->query($sql,$this->realConn);
	}
	
}