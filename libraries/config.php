<?php
if (!defined('LIBRARIES')) die("Error");
/* Root */
define('ROOT', __DIR__);
/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');
/* Cấu hình coder */
define('NN_MSHD', '1438322w');
define('NN_AUTHOR', 'phuongpham0603.nina@gmail.com');
/* Cấu hình chung */
$config = array(
	'author' => array(
		'name' => 'Phạm Nhựt Phương',
		'email' => 'phuongpham0603.nina@gmail.com',
		'timefinish' => date('m/Y', time() - (864000 * 30))
	),
	'arrayDomainSSL' => array(),
	'database' => array(
		'server-name' => $_SERVER["SERVER_NAME"],
		'url' => '/',
		'type' => 'mysql',
		'host' => 'localhost',
		'username' => 'feyapngaee',
		'password' => '97GjnFQq2Z',
		'dbname' => 'feyapngaee',
		'port' => 3306,
		'prefix' => 'table_',
		'charset' => 'utf8mb4'
	),
	'website' => array(
		'error-reporting' => false,
		'secret' => '@nina',
		'salt' => 'l7MPb0U0L8',
		'debug-developer' => false,
		'debug-css' => false,
		'debug-js' => true,
		'index' => false,
		'upload' => array(
			'max-width' => 1600,
			'max-height' => 1600
		),
		'lang' => array(
			'vi' => 'Tiếng Việt',
			// 'en'=>'Tiếng Anh',
			// 'cn'=>'Tiếng Trung',
			// 'ko'=>'Tiếng Hàn',
			// 'jp'=>'Tiếng Nhật',
			// 'kh'=>'Tiếng Campuchia',
		),
		'lang-doc' => 'vi',
		'slug' => array(
			'vi' => 'Tiếng Việt',
		),
		'seo' => array(
			'vi' => 'Tiếng Việt',
			// 'en'=>'Tiếng Anh',
			// 'cn'=>'Tiếng Trung',
			// 'ko'=>'Tiếng Hàn',
			// 'jp'=>'Tiếng Nhật',
			// 'kh'=>'Tiếng Campuchia',
		),
		'comlang' => array()
	),
	'order' => array(
		'ship' => false
	),
	'login' => array(
		'admin' => 'LoginAdmin' . NN_MSHD,
		'member' => 'LoginMember' . NN_MSHD,
		'attempt' => 5,
		'delay' => 15
	),
	'googleAPI' => array(
		'recaptcha' => array(
			'active' => false,
			'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
			'sitekey' => '6LezS5kUAAAAAF2A6ICaSvm7R5M-BUAcVOgJT_31',
			'secretkey' => '6LezS5kUAAAAAGCGtfV7C1DyiqlPFFuxvacuJfdq'
		)
	),
	'oneSignal' => array(
		'active' => false,
		'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
		'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
	),
	'license' => array(
		'version' => "",
		'powered' => ""
	)
);
if ($_SERVER["SERVER_NAME"] == 'goicuoc4gmobifone.com') $config['key'] = '2f3931106578ed4b67ca90a6997d0e4b';
$config['pattern'] = '111';
/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);
/* Cấu hình base */
$http = 'http';
if ($_SERVER["HTTPS"] == "on") {
	$http .= "s";
}
$http .= "://";
$config_url = $config['database']['server-name'] . $config['database']['url'];
$config_base = $http . $config_url;
/* Cấu hình login */
$login_admin = $config['login']['admin'];
$login_member = $config['login']['member'];
/* Cấu hình upload */
require_once LIBRARIES . "constant.php";
if ($config['arrayDomainSSL']) require_once LIBRARIES . "checkSSL.php";
