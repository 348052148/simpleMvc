<?php
/**
 * 配置文件管理器
 * @author Administrator
 *
 */
class ConfigManager{
	static $configManager=null;
	private $config;
	private $dbConfig;
	
	private $controlConfig;
	/**
	 * 主配置文件
	 * @param unknown $config_arr
	 */
	public function setConfig($config_arr)
	{
		$this->config=$config_arr;
	}
	public function getConfig()
	{
		return $this->config;
	}
	/**
	 * 数据配置文件
	 * @param unknown $db_config
	 */
	public function setDbConfig($db_config)
	{
		$this->dbConfig=$db_config;
	}
	public function getDbConfig()
	{
		return $this->dbConfig;
	}
	/**
	 * 配置 control 控制器
	 */
	public function setControlConfig($control_c)
	{
		$this->controlConfig=$control_c;
	}
	public function getControlConfig()
	{
		return $this->controlConfig;
	}	
	/**
	 * 获取实例 ---采用单例模式
	 * @return ConfigManager
	 */
	public static function getInstance()
	{
		if(self::$configManager==null)
		{
			self::$configManager=new ConfigManager();
		}
		
		return self::$configManager;
	}
	
}

class Application{

	public function __construct()
	{

	}
	public function call()
	{
		echo "SB";
	}
}
class Core {
	
	private static $app=null;
	public static function app()
	{
		if(self::$app==null)
			self::$app=new Application();
		return self::$app;
	}
	public static function config()
	{
		return ConfigManager::getInstance();
	}
	
}
/*
 * 可在此注册
 */
function __autoload($className)
{
	include_once "App/Controller/".$className.'.php';
	include_once 'App/View/'.$className.'.php';
}
