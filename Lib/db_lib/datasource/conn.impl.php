<?php
/**
 * װ��ģʽ������ ��conn�����˼򵥵İ�װ��
 * @author Administrator
 *1.��ÿ�����������м���
 *2.�����ӵ��ַ�������
 *3.�����ӵĵ����ݿ�����
 *4.���������..
 */
class Conn implements Iconn
{
	private $dataSource;
	
	private $c_count; //�����������㱾���ӱ�ʹ�ô�����
	
	private $c_max; //���㱾���� ���ʹ�ô����� (��֪��һ����Դ����ʹ�þ��˻᲻�ᵼ����Դ������һϵ������)
	
	private $realConn;
	
	private $dbName;
	
	private $character;
	
	public function __construct($dataSource)
	{
		$this->dataSource=$dataSource;
		$this->c_count=0;
		$this->c_max=0;
		$this->realConn=$this->dataSource->getConn();
		
		$this->dbName=$this->dataSource->getDbName();
		
		$this->character=$this->dataSource->getCharacter();
		/**
		 * ѡ�� �������ݿ⡣Ĭ�ϴ�����Դ�̳�
		 */
		mysql_select_db($this->dbName,$this->realConn);
		
		/**
		 * ���� ���ӵ��ַ��� Ĭ�ϴ�����Դ�̳�
		 */
		mysql_query("set names '$this->character'",$this->realConn);
		//mysql_query("set names 'gbk'",$this->realConn);
	}
	
	/**
	 * ��ȡ��ʵ����
	 * @see Iconn::getRealConn()
	 */
	public function getRealConn()
	{
		$this->c_count++;
		
		return $this->realConn;
	}
	/**
	 * �������ͷ�conn��Դ
	 * @see Iconn::freeConn()
	 */
	public function freeConn()
	{
		mysql_close($this->realConn);
	}
	/**
	 * �������ӣ��ṩ��ѯ���ܡ�
	 * @see Iconn::query()
	 */
	public function query($sql)
	{
		return $this->dataSource->query($sql,$this->realConn);
	}
	
}