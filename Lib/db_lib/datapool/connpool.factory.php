<?php
class ConnPoolFactory
{
	public static function getConnPool()
	{
		return new ConnPool(DataSourceFactory::getDataSource());
	}
}