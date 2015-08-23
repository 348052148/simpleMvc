<?php
/*
 * 默认加载 id为id ,key为rowName 
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
	/**
	 * 存在0的风险
	 */
	public function delete($id=0){
		if($id==0){
			$id=$this->pid;
		}
		$sql="delete from $this->table_name where ";
		if (empty($this->ruls)){
			$sql.="{$this->m_idName}='$id'";
		}else{
			$sql.="{$this->ruls['ID']}='$id'";
		}
		$this->sqlT->execute($sql);
	}
	public function save()
	{
		$sql="insert into $this->table_name (";
		$vals="values(";
		if(empty($this->ruls)){
			foreach ($this->attribute as $k=>$v)
			{
				$sql.=$k.',';
				$vals.="'$v',";
			}
			$sql=substr($sql, 0, -1);
			$vals=substr($vals, 0, -1);
			$sql.=') ';
			$sql.=$vals.")";
		}else{
			foreach ($this->ruls as $k=>$v){
				foreach ($this->attribute as $key=>$val){
					if($k==$key){
						$sql.=$v.',';
						$vals.="'$val',";
					}
				}
			}
			$sql=substr($sql, 0, -1);
			$vals=substr($vals, 0, -1);
			$sql.=') ';
			$sql.=$vals.")";
		}
		$this->sqlT->execute($sql);
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
	 * 若使用，必须设置ID
	 */
	public abstract function cast();
	
	
}