# Cara Installasi 
## Install lewat terminal linux (cloning)
pastekan bash ini lewat terminal
> git clone https://github.com/heroez17/sinergi.git
pastikan sudah berada di didirektori lampp dan apcahe /var/www/html/
## Install lewat os lain
1. akses url berikut
> https://github.com/heroez17/sinergi.git
2. klik button Clone or Download di pojok kanan atas (warna ijo)
3. pilih download zip
4. ekstrak dan pindahkan ke dalam direktori xampp dan apache **htdocs**

# Configuration
## Database
1. buat database baru mengguunaka MySql
2. import sinergikasir.sql kedalam db sampean
## Config CI
1. masuk ke config.php
```
$config['base_url']	= 'http://localhost/kas/'; //sesuaikan dengan base_url yg sampean buat

$config['index_page'] = 'index.php';
```
2. database.php
```
$active_group = 'default';
$active_record = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', //sesuaikan dengan uname db sampean
	'password' => 'password', //sesuiakan dengan pasword db sampean
	'database' => 'sinergikasir', //sesuaikan dengan nama db yang sampean buat
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
