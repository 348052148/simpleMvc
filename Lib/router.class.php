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
	
	public function mapped($url)
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
	}
	
}
