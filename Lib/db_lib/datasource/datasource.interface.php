<?php
/**
 * ����Դ ��Ҫ���������� �����ݿ������������л���ȵ���Ϣ��
 * 1.�ṩ���ӳء�
 * 2.�ṩ��ͬ���ݽӿ��л���
 * 3.��չ�������ӣ���֤�������ӵ��ȶ���߿��á�
 * @author Administrator
 *
 */
class DataBase{
	public static $NOT_RETURN=1;
	
	public static $RETURN_ROW=2;
	
	public static $RETURN_MUL_ROW=3;
}
interface DataSource
{
	public function getDbConfig();
	
	public function setDbConfig($db_config);
	
	public function getConn();
	
}