<?php if (!defined('_VALID_MOS')) define( '_VALID_MOS', 1 );

   	error_reporting(E_ALL);
	error_reporting( error_reporting() & ~E_NOTICE );
	error_reporting(E_ALL ^ E_NOTICE);
	
	session_start();

	//ob_start();

	ini_set('zlib_output_compression','On');
	ini_set('zlib_output_compression_level','5');
	
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('Asia/Ho_Chi_Minh');	
		
	define('REAL_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
	
	$wtidebug_start = microtime( );
	
	// kiem tra nếu tượng lửa được thiết lập thì chạy tường lửa
	if ( file_exists( "firewall.php" ) )
	{
		include_once( "firewall.php" );
	}
    // class thư viện các hàm dùng chung trong toàn hệ thống
    include_once("../include/core_class.php");
    global $func;
    $func = new core_class();
	// class lưu trữ các biến cấu hình
	include_once("../include/init.config.php");
	$wti = new wti_registry();

	// class truy xuất database PDO
	include_once("../include/db_class.php");
	$dbObj = new classDb();
	
	if ( $conf['app']['web_close'] )
	{
		flush( );
		include_once( "webclose.php" );
		exit( );
	}
	
	// load class template
	//include_once("../include/template.class.php");
	
	include_once("templates/byadmin/index.php");

	//$Template = new Template( "templates/adminplus/index.php" );

	// debug execute time
	$wtidebug_end = microtime( );
	
	if ( $_GET['debug'] == 1 )
	{	
		$time_start = $func->micro_time( $wtidebug_start );
    	$time_stop 	= $func->micro_time( $wtidebug_end );
		//echo $core_class->debug_log( );
   		echo "<br>";
		echo "Exec time: " . bcsub( $time_stop, $time_start, 6 ) . " s";
	}		
?>