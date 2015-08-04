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
	
	public function mapped($url)
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
	}
	
}
