<?php
/**
 * ��װÿ����������
 * @author Administrator
 *
 */
interface Iconn
{
	public function getRealConn();
	
	public function freeConn();
	
	public function query($sql);
}