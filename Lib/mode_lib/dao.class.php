<?php
/**
 * Dao���ݷ��ʶ����ṩ�����ݶ�������ݵķ�װ��ʵ�����ݴӹ�ϵ�������ӳ�䡣
 * @author Administrator
 *
 */
abstract class Dao
{
	/**
	 * ��ϵ-������ ����ӳ��
	 */
	public abstract function mapped();
	
	public abstract function handule();
	
	public function __construct()
	{
		/**
		 * ���� ���� ���ڹ�ϵ�����ݵ�����������ӳ��
		 */
		$this->mapped();
		
		$this->handule();
	}
}