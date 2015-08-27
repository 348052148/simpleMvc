<?php
class View implements Iview
{
	private $system; //系统参数
	private $template; //模板路径
	private $params=array();
	private $layout; //布局
	public function __construct($params=array()){
		$layout=ConfigManager::getInstance()->getConfig();
		$this->layout=$layout['layout'];
		$this->params=$params;
	}
	public function render()
	{
		$this->header();
		$data=file_get_contents($this->template);
		$data=$this->tagFilter($data);
		//$data=$this->incFilter($data);
		echo $data;
		//include $this->template;
		$this->floor();
	}
	public function header()
	{
		$head=file_get_contents($this->layout['header']);
		echo $this->tagFilter($head);
	}
	public function floor()
	{
		$floor=file_get_contents($this->layout['floor']);
		echo $this->tagFilter($floor);
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
	private function tagFilter($data)
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
	private function incFilter($data)
	{
		
	}
}