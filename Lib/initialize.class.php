<?php
/*
 * Application Init
 */
class C extends Core{}
/**
 * 初始化 config配置数据
 */
ConfigManager::getInstance()->setConfig(include 'Config/config.php');
/**
 * 初始化 db_config数据库配置
 */
ConfigManager::getInstance()->setDbConfig(include 'Config/db_config.php');
/**
 *  初始化control 控制器
 */
ConfigManager::getInstance()->setControlConfig(include 'Config/control_config.php');

/**
	路由 规则映射
 */
$router=new Router(ConfigManager::getInstance()->getControlConfig());

$router->mapped();
