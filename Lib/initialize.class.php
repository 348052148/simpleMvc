<?php

/**
 * ��ʼ�� config��������
 */
ConfigManager::getInstance()->setConfig(include 'Config/config.php');
/**
 * ��ʼ�� db_config���ݿ�����
 */
ConfigManager::getInstance()->setDbConfig(include 'Config/db_config.php');
/**
 *  ��ʼ��control ������
 */
ConfigManager::getInstance()->setControlConfig(include 'Config/control_config.php');

/**
	·�� ����ӳ��
 */
$router=new Router(ConfigManager::getInstance()->getControlConfig());

/**
 * ��ȫƥ�����
 */
$router->mapped($_SERVER['QUERY_STRING']);
/**
 *����ƥ�����
 */

