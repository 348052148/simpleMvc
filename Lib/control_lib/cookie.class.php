<?php
/**
 * ˼����
 * 1.��ӿɶ�̬�޸�cookie��expire��ֵ�Ĺ��ܡ�
 * 2.�Ƿ���Ҫ����������С�
 * @author Administrator
 * ע�⣺
 * cookie����������ͷ��Ϣ�������ڿ���ǰ�������κζ�������������
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
	 * ����cookie
	 * @see Icookie::setCookie()
	 */
	public function setCookie($key,$val)
	{
		return setcookie($key,$val);
	}
	/**
	 * ɾ��cookie ɾ��cookie�����ַ�ʽ��
	 * 1.ֱ��ɾ��
	 * 2.���ù���
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