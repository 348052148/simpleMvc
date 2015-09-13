<?php
/*
 *  {key} 这是带入参数
 *  {:key} 这是系统参数
 */
abstract class View implements Iview
{
	private $system=array(); //系统参数
	private $template; //模板路径
	private $params=array();
	private $layout; //布局
	private $tagList;
	public function __construct($params=array()){
		$conf=ConfigManager::getInstance()->getConfig();
		$this->layout=$conf['layout'];
		$this->params=$params;
		$this->system=$conf;
		$this->tagList=include 'Lib/weiget_lib/weiget.list.php';
	}
	public function render()
	{
		$this->header();
		$data=file_get_contents($this->template);
		$data=$this->init_filter($data);
		//$data=$this->incFilter($data);
		echo $data;
		//include $this->template;
		$this->floor();
	}
	public function header()
	{
		$head=file_get_contents($this->layout['header']);
		echo $this->init_filter($head);
	}
	public function floor()
	{
		$floor=file_get_contents($this->layout['floor']);
		echo $this->init_filter($floor);
	}
	public function setParams($params)
	{
		$this->params=$params;
	}
	public function setTemplate($template)
	{
		$this->template=$template;
	}
	/*
	 * 过滤规则可以进行重写 实现单独的类 或者实现动态加载。
	 */
	private function init_filter($data)
	{
	    $data=$this->filter($data);
	    $data=$this->tagFilter($data);
	    $data=$this->dataFilter($data);
	    $data=$this->sysFilter($data);
	    return $data;
	}
	private function dataFilter($data)
	{
	    if (!empty($this->params) && is_array($this->params))
	    {
	        foreach ($this->params as $k=>$v)
	        {
	            $data=preg_replace("/{".$k."}/", "$v", $data);
	        }
	    }
	    return $data;
	}
	private function tagFilter($data)
	{
	    if (!empty($this->tagList) && is_array($this->tagList))
	    {
	        foreach ($this->tagList as $k=>$v)
	        {
	     $data=preg_replace("/{@".$k."}/", $v->render(), $data);
	        }
	    }
		return $data;
		
	}
	private function sysFilter($data)
	{
		if (!empty($this->system) && is_array($this->system))
		{
			foreach ($this->system as $k=>$v)
			{
				$data=preg_replace("/{:".$k."}/", "$v", $data);
			}
		}
		return $data;
	}
	/*
	 * 此函数必须要返回值   本过滤作为所有过滤的最前置过滤，主要考虑到用户的自定义过滤会导致不稳定
	 * 本次自定过滤机制，考虑了用传入函数机制，但1由于作者偏爱抽象，所以用了抽象
	 */
	public abstract function filter($data);
}