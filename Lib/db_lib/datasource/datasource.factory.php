<?php
/**
 *  ����Դ ������
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