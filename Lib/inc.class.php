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
	private $cacheConf;
	private $controlConfig;
	/**
	 * 主配置文件
	 * @param unknown $config_arr
	 */
	private function __construct()
	{
	    $this->cacheConf=array();
	    $this->config=array();
	    $this->dbConfig=array();
	    $this->controlConfig=array();
	}
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
	 * cache配置文件
	 */
	public function setCacheConfig($cache_c)
	{
	    $this->cacheConf=$cache_c;
	}
	public function getCacheConfig()
	{
	    return $this->cacheConf;
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
	private $config; 
	public $static; //静态文件目录
	public function __construct()
	{
		$this->config=ConfigManager::getInstance()->getConfig();
		$this->static=$this->config['static'];
		$this->init(); 
	}
	//预留 主要是discuz思想影响
	private function init()
	{
	    $this->init_env();
	    $this->init_session();
	    $this->init_cache();
	    $this->init_db();
	    $this->init_user();
	}
	//加载环境变量
	private function init_env()
	{
	    
	}
	//初始化session
	private function init_session()
	{
	    
	}
	//初始化user
	private function init_user()
	{
	    
	}
	//初始化db
	private function init_db()
	{
	    
	}
	//初始化缓存
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

