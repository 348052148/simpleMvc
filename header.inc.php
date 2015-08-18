<?php
/**
 * 头部文件主要引入 系统类。。
 */

/**
 * control_lib
 */
include_once 'Lib/control_lib/control.interface.php';
include_once 'Lib/control_lib/control.class.php';

include_once 'Lib/control_lib/session.interface.php';
include_once 'Lib/control_lib/session.class.php';

include_once 'Lib/control_lib/cookie.interface.php';
include_once 'Lib/control_lib/cookie.class.php';

/**
 * db_lib
 */
include_once 'Lib/db_lib/db.interface.php';
include_once 'Lib/db_lib/sqltemplate.class.php';
include_once 'Lib/db_lib/rowresult.class.php';
/**
 * db_lib/datasource
 */

include_once 'Lib/db_lib/datasource/datasource.interface.php';
include_once 'Lib/db_lib/datasource/datasource.impl.php';
include_once 'Lib/db_lib/datasource/datasource.factory.php';
include_once 'Lib/db_lib/datasource/conn.interface.php';
include_once 'Lib/db_lib/datasource/conn.impl.php';
/**
 * db_lib/datapool
 */
include_once 'Lib/db_lib/datapool/connpool.interface.php';
include_once 'Lib/db_lib/datapool/connpool.impl.php';
include_once 'Lib/db_lib/datapool/connpool.factory.php';

/**
 * mode_lib
 */
include_once 'Lib/model_lib/model.interface.php';
include_once 'Lib/model_lib/dao.class.php';

/**
 * view_lib
 */
include_once 'Lib/view_lib/view.interface.php';
include_once 'Lib/view_lib/view.class.php';
/**
 * App 目录下的会实现动态包含。
 */
//include_once "App/Controller/ServiceImpl.php";

include_once 'App/View/index.view.php';



