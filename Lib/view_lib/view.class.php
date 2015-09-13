<?php
/*
 *  {key} ���Ǵ������
 *  {:key} ����ϵͳ����
 */
abstract class View implements Iview
{
	private $system=array(); //ϵͳ����
	private $template; //ģ��·��
	private $params=array();
	private $layout; //����
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
	 * ���˹�����Խ�����д ʵ�ֵ������� ����ʵ�ֶ�̬���ء�
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
	 * �˺�������Ҫ����ֵ   ��������Ϊ���й��˵���ǰ�ù��ˣ���Ҫ���ǵ��û����Զ�����˻ᵼ�²��ȶ�
	 * �����Զ����˻��ƣ��������ô��뺯�����ƣ���1��������ƫ�������������˳���
	 */
	public abstract function filter($data);
}