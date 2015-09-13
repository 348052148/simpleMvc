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
	private $config; 
	public $static; //��̬�ļ�Ŀ¼
	public function __construct()
	{
		$this->config=ConfigManager::getInstance()->getConfig();
		$this->static=$this->config['static'];
	}
	//Ԥ�� ��Ҫ��discuz˼��Ӱ��
	private function init()
	{
	    $this->init_env();
	    $this->init_session();
	    $this->init_cache();
	    $this->init_db();
	    $this->init_user();
	}
	//���ػ�������
	private function init_env()
	{
	    
	}
	//��ʼ��session
	private function init_session()
	{
	    
	}
	//��ʼ��user
	private function init_user()
	{
	    
	}
	//��ʼ��db
	private function init_db()
	{
	    
	}
	//��ʼ������
	private function init_cache()
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

