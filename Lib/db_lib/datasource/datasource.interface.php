<?php
/**
 * ����Դ ��Ҫ���������� �����ݿ������������л���ȵ���Ϣ��
 * 1.�ṩ���ӳء�
 * 2.�ṩ��ͬ���ݽӿ��л���
 * 3.��չ�������ӣ���֤�������ӵ��ȶ���߿��á�
 * @author Administrator
 *
 */
interface DataSource
{
	public function getDbConfig();
	
	public function setDbConfig($db_config);
	
	public function getConn();
	
}