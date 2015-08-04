<?php
interface Db
{
	public function conn();
	
	public function setDataSource($dataSource);
	
	public function getDataSource();
	
}