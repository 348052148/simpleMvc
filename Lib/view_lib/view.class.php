<?php
class View implements Iview
{
	private $system; //ϵͳ����
	private $template; //ģ��·��
	private $params=array();
	private $layout; //����
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
	 * ���˹�����Խ�����д ʵ�ֵ������� ����ʵ�ֶ�̬���ء�
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