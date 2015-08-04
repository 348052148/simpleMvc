<?php
/**
 * 思考：
 * 1.添加可动态修改cookie的expire等值的功能。
 * 2.是否需要建立缓存队列。
 * @author Administrator
 * 注意：
 * cookie由于是设置头信息，所以在开启前不能有任何对浏览器的输出。
 */
class Cookie implements Icookie
{
	private $name;
	private $value;
	private $expire;
	private $path;
	private $domain;
	private $secure;
	/**
	 * 设置cookie
	 * @see Icookie::setCookie()
	 */
	public function setCookie($key,$val)
	{
		return setcookie($key,$val);
	}
	/**
	 * 删除cookie 删除cookie有两种方式，
	 * 1.直接删除
	 * 2.设置过期
	 * @see Icookie::removeCookie()
	 */
	public function removeCookie($key)
	{
		return setcookie($key);
	}
	
	public function getCookieState()
	{
		
	}
}