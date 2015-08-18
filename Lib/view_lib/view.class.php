<?php
class View implements Iview
{
	private $template;
	private $params;
	private $layout;
	public function __construct(){
		$layout=ConfigManager::getInstance()->getConfig();
		$this->layout=$layout['layout'];
	}
	public function render()
	{
		$this->header();
		//$data=file_get_contents($this->template);
		//$data=$this->tagFilter($data);
		//$data=$this->incFilter($data);
		//echo $data;
		include $this->template;
		$this->floor();
	}
	public function header()
	{
		$f=$this->layout;
		include $f['header'];
	}
	public function floor()
	{
		$f=$this->layout;
		include $f['floor'];
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
	 * ���˹�����Խ�����д ʵ�ֵ������� ����ʵ�ֶ�̬���ء�
	 */
	private function tagFilter($data)
	{
		return $data;
	}
	private function incFilter($data)
	{
		
	}
}