<?php
/*
 * Ĭ�ϼ��� idΪid ,keyΪrowName
 */
abstract class Model implements Imodel
{
	private $table_name;
	public $attribute;
	private $ruls;
	private $sqlT;
	private $pid;
	private $m_idName;
	
	public function __construct(){
		$this->init();
	}
	public function init()
	{
		$this->table_name=$this->table();
		//$this->attribute=array();
		$this->ruls=$this->cast();
		$this->m_idName="AFF_ID";
		$this->sqlT=SqlTemplate::getInstance();
		
	}
	public function save()
	{
		
	}
	public function update()
	{
		$sql="UPDATE ".$this->table_name." SET ";
		if(empty($this->ruls)){
			foreach ($this->attribute as $k=>$v){
				$sql.=$k."='$v',";
			}
			$sql=substr($sql, 0, -1);
			$sql.=" where ".$this->m_idName."='$this->pid'";
		}else {
			foreach ($this->ruls as $k=>$v)
			{
				foreach ($this->attribute as $key=>$val)
				{
					if($k==$key){
						$sql.=$v."='$val',";
					}
				}
			}
			$sql=substr($sql, 0, -1);
			$sql.=" where ".$this->ruls['ID']."='$this->pid'";
		}
		$this->sqlT->execute($sql);
		
	}
	public function findByPk($id)
	{
		if(empty($this->ruls)){
			$sql="select * from $this->table_name where ".$this->m_idName."='$id'";
		}else {
			$sql="select * from $this->table_name where ".$this->ruls['ID']."='$id'";
		}
		
		$this->pid=$id;
		$ret=$this->sqlT->queryForRow($sql);
		if(empty($this->ruls)){
			$this->attribute=$ret;
		}else{
			$arr=array();
			foreach ($ret as $k=>$v)
			{
				foreach ($this->ruls as $key=>$val)
				{
					if($val==$k){
						$arr[$key]=$v;
					}
				}
			}
			$this->attribute=$arr;
		}
		
	}
	
	public abstract function table();
	/*
	 * ��ʹ�ã���������ID
	 */
	public abstract function cast();
	
	
}