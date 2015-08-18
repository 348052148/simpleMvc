<?php
/**
 * �����ļ�������
 * @author Administrator
 *
 */
class ConfigManager{
	static $configManager=null;
	private $config;
	private $dbConfig;
	
	private $controlConfig;
	/**
	 * �������ļ�
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
	 * ���������ļ�
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
	 * ���� control ������
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
	 * ��ȡʵ�� ---���õ���ģʽ
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
 * ���ڴ�ע��
 */
function __autoload($className)
{
	include_once "App/Controller/".$className.'.php';
	include_once 'App/View/'.$className.'.php';
}
