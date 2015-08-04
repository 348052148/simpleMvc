<?php
/**
 * Dao数据访问对象。提供对数据对象的数据的封装。实现数据从关系到对象的映射。
 * @author Administrator
 *
 */
abstract class Dao
{
	/**
	 * 关系-》对象 数据映射
	 */
	public abstract function mapped();
	
	public abstract function handule();
	
	public function __construct()
	{
		/**
		 * 生成 数据 用于关系型数据到对象型数据映射
		 */
		$this->mapped();
		
		$this->handule();
	}
}