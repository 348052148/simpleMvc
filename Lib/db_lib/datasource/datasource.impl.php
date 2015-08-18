<?php
class MysqlDataSource implements DataSource
{
	
	private $host;
	
	private $user;
	
	private $pass;
	
	private $db_name;
	
	private $character;
	
	public function __construct()
	{
		/**
		 * 初始化。数据库信息、 这里读取配置文件信息。
		 */
		$dbConfig=ConfigManager::getInstance()->getDbConfig();
		
		$this->host=$dbConfig['host'];
		$this->user=$dbConfig['user'];
		$this->pass=$dbConfig['pass'];
		$this->db_name=$dbConfig['dbname'];
		$this->character=$dbConfig['character'];
		
	}
	
	public function getDbName()
	{
		return $this->db_name;
	}
	
	public function getCharacter()
	{
		return $this->character;
	}
	
	public function getConn()
	{
		return mysql_connect($this->host,$this->user,$this->pass,true);
	}
	
	public function getDbConfig()
	{
		
	}
	
	public function setDbConfig($db_config)
	{
		
	}
	
	public function query($sql,$conn)
	{
		return mysql_query($sql,$conn);
	}
	
}