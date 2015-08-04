<?php
/**
 *  数据源 工厂。
 * @author Administrator
 *
 */
class DataSourceFactory
{
	
	public static function getDataSource()
	{
		return new MysqlDataSource();
	}
	
}