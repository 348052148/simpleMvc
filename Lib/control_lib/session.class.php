<?php
/**
 * Session ����
 * @author Administrator
 * �������Session���ơ�Session������Ӧ�ṩ���ֽӿڡ���
 * ע�⣺
 * session Ĭ��Ϊcookie���ƣ������ڿ���ǰ�������κζ�������������
 * 
 */
  /*
	session_cache_expire();
	session_cache_limiter();
	session_commit();
	session_decode($data);
	session_encode();
	session_get_cookie_params();
	session_id();
	session_name();
	session_module_name();
	session_status();
	*/
class Session implements Isession
{
	/**
	 * ���� Session ���� ���ü���session���鸺��
	 * @var unknown
	 * 
	 */
	private $session_cache;
	
	public function __construct()
	{
		/**
		 * 1.����Session
		 */
		$this->startSession();
		
		
	}
	
	public function setSession($key,$val)
	{
		$_SESSION[$key]=$val;
	}
	/**
	 * ɾ��ĳһֵ
	 * @see Isession::destroySession()
	 */
	public function removeSession($key)
	{
		unset($_SESSION[$key]);
	}
	/**
	 * ���
	 * @see Isession::getSession()
	 */
	public function destroySession($key)
	{
		if(count($_SESSION)>0)
		{
			$_SESSION=array();
		}
	}
	public function getSession($key)
	{
		if(isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		return false;
	}
	
	public function startSession()
	{
		return session_start();
	}
	
	public function stopSession()
	{
		return session_destroy();
	}
}