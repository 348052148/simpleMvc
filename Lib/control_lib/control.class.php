<?php
/**
 * ������ ����
 * @author Administrator
 * 1.�������
 * 2.session����
 * 3.cookie����
 * 4.���ݴ洢���ơ�
 * 
 */
abstract class Control implements Icontrol
{
	/**
	 *  get or post ����
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
	 * Seesion ����
	 */
	private $session;
	/**
	 * Cookie ����
	 */
	private $cookie;
	/**
	 * ��ʼ�� ����
	 */
	public function __construct()
	{
		/**
			�ܵĲ��� ����post get
		 */
		$this->parames=array_merge($_GET,$_POST);
		/**
		 * get ����
		 */
		$this->get_parames=$_GET;
		
		/**
		 * post ����
		 */
		$this->post_parames=$_POST;

		/**
		 * ��ʼ�����ݴ洢�ṹ
		 */
		 $this->data=array();
		 /**
		  * ��ʼ�� session cookie ����
		  */
		 $this->cookie=new Cookie();
		 
		 $this->session=new Session();
		 
	}
	/**
	 * ��ȡ�ܲ���
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
		 * �ж� ����ʽ �����get �͵���doGet post����doPost
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
	
	public abstract function doGet();
	/**
	 * ����doPost���캯��
	 */
	public abstract function doPost();
	
	
}