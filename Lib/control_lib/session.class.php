<?php
/**
 * Session 机制
 * @author Administrator
 * 深入理解Session机制。Session机制理应提供多种接口。。
 * 注意：
 * session 默认为cookie机制，所以在开启前不能有任何对浏览器的输出。
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
	 * 缓存 Session 数据 作用减轻session数组负担
	 * @var unknown
	 * 
	 */
	private $session_cache;
	
	public function __construct()
	{
		/**
		 * 1.启动Session
		 */
		$this->startSession();
		
		
	}
	
	public function setSession($key,$val)
	{
		$_SESSION[$key]=$val;
	}
	/**
	 * 删除某一值
	 * @see Isession::destroySession()
	 */
	public function removeSession($key)
	{
		unset($_SESSION[$key]);
	}
	/**
	 * 清空
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