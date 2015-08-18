<?php
/**
 * 控制器 基类
 * @author Administrator
 * 1.请求参数
 * 2.session机制
 * 3.cookie机制
 * 4.数据存储机制。
 * 
 */
abstract class Control implements Icontrol
{
	/**
	 *  get or post 参数
	 * @var unknown
	 */
	private $parames;
	
	private $get_parames;
	
	private $post_parames;
	/**
	 * data
	 */
	private $data;
	/**
	 * Seesion 对象
	 */
	private $session;
	/**
	 * Cookie 对象
	 */
	private $cookie;
	/**
	 * 初始化 参数
	 */
	public function __construct()
	{
		/**
			总的参数 包括post get
		 */
		$this->parames=array_merge($_GET,$_POST);
		/**
		 * get 参数
		 */
		$this->get_parames=$_GET;
		
		/**
		 * post 参数
		 */
		$this->post_parames=$_POST;

		/**
		 * 初始化数据存储结构
		 */
		 $this->data=array();
		 /**
		  * 初始化 session cookie 对象
		  */
		 $this->cookie=new Cookie();
		 
		 $this->session=new Session();
		 
	}
	/**
	 * 获取总参数
	 * @return unknown
	 */
	public function getParames($key)
	{	
		return $this->parames[$key];
	}
	
	public function getData()
	{
		return $this->data;
	}
	public function setData($data)
	{
		$this->data=$data;
	}
	
	public function getSession()
	{
		return $this->session;
	}
	
	public function getCookie()
	{
		return $this->cookie;
	}
	
	public function service()
	{
		/**
		 * 判断 请求方式 如果是get 就调用doGet post调用doPost
		 */
		if(strtolower($_SERVER['REQUEST_METHOD'])=="get")
		{
			
			$this->doGet();
		}
		if(strtolower($_SERVER['REQUEST_METHOD'])=="post")
		{
			$this->doPost();
		}
	}
	/**
	 * 加载视图 并作一些释放处理 这里可以做一个 前置处理和后置处理
	 */
	public function load($view)
	{
		exit;
	}
	
	public abstract function doGet();
	/**
	 * 虚拟doPost构造函数
	 */
	public abstract function doPost();
	
	
}