<?php
/**
 * ·�ɹ������
 * @author Administrator
 *
 */

class Router
{
	private $path;
	private $param;
	private $urlControl;
	/**
	 * ���캯��
	 * @param unknown $url_contrl
	 */
	public function __construct($url_contrl)
	{
		$this->urlControl=$url_contrl;
		
	}
	/*
	 * ·�ɹ�������Ӧ�ù��˵���������·�ɣ���֤����ľ����ԡ�APPӦ�ö��ⲿӦ����˽�е�
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
					 * ����ӳ��� ������ ��
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
