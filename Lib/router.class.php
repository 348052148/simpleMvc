<?php
/**
 * 路由规则解析
 * @author Administrator
 *
 */

class Router
{
	private $path;
	private $param;
	private $urlControl;
	/**
	 * 构造函数
	 * @param unknown $url_contrl
	 */
	public function __construct($url_contrl)
	{
		$this->urlControl=$url_contrl;
		
	}
	/*
	 * 路由管理器，应该过滤掉不正常的路由，保证程序的绝对性。APP应用对外部应该是私有的
	 */
	public function mapped()
	{
		$control=ConfigManager::getInstance()->getConfig();
 		$url='';
		if($control['control_z']!=0)
		{
			foreach($this->urlControl as $urls=>$control)
			{
				if($urls==$url)
				{
					/**
					 * 处理映射的 控制器 类
					 */
					//include $control;
					$r=new $control();
					$r->service();
				}
			}
		}else {
			$class=$_GET['c'];
			if(class_exists($class)){
				$c= new $class;
				$c->service();
			}
		}
	}
	
}
