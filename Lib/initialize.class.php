<?php
 /*  1   E_ERROR      
  2   E_WARNING      
  4   E_PARSE      
  8   E_NOTICE      
  16   E_CORE_ERROR      
  32   E_CORE_WARNING      
  64   E_COMPILE_ERROR      
  128   E_COMPILE_WARNING      
  256   E_USER_ERROR      
  512   E_USER_WARNING      
  1024   E_USER_NOTICE      
  2047   E_ALL      
  2048   E_STRICT  
  */
error_reporting(0);
/*
 * Application Init
 */
class C extends Core{}
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
 * ��ʼ�� cache ��������
 */
 ConfigManager::getInstance()->setCacheConfig(include 'Config/cache_config.php');
/**
	·�� ����ӳ��
 */
$router=new Router(ConfigManager::getInstance()->getControlConfig());

$router->mapped();
