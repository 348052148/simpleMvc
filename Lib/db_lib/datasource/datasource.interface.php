<?php
/**
 * 数据源 主要是用来处理 对数据库的链接请求进行缓存等的信息。
 * 1.提供连接池。
 * 2.提供不同数据接口切换。
 * 3.拓展数据连接，保证数据连接的稳定与高可用。
 * @author Administrator
 *
 */
interface DataSource
{
	public function getDbConfig();
	
	public function setDbConfig($db_config);
	
	public function getConn();
	
}