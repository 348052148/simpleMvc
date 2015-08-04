<?php
/**
 * 封装每个数据连接
 * @author Administrator
 *
 */
interface Iconn
{
	public function getRealConn();
	
	public function freeConn();
	
	public function query($sql);
}