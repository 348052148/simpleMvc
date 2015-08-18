<?php
abstract class Model implements Imodel
{
	private $table_name;
	public $attribute;
	private $sqlT;
	
	public function __construct(){
		$this->init();
	}
	public function init()
	{
		$this->table_name=$this->table();
		//$this->attribute=array();
		$this->sqlT=SqlTemplate::getInstance();
		
	}
	public function save()
	{
		
	}
	public function update()
	{
		
	}
	public function findByPk($id)
	{
		$sql="select * from $this->table_name ";
		
		$this->attribute=$this->sqlT->queryForRow($sql);
		
	}
	
	public abstract function table();
	
	public abstract function cast();
	
	
}