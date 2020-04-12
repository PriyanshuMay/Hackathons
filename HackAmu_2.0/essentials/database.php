<?php  	
$host="localhost"; // Host name 
$user="root";     // Mysql user 
$datapass="";
$database="janshakti";                   // User can here declare a variable for a password

$con=mysqli_connect("$host","$user","$datapass") or die('Database not connected'); //connecting database without a password

$db = mysqli_select_db($con,$database);
if (empty($db))     // if database doesn't exist 
{
	$dbcr = 'create database janshakti';   // create a database `forum` 
	$check = mysqli_query($con,$dbcr);
if (!$check) {

      echo "database couldn't be created ";
  }	
  }
  $table1 = " select * from userbase";
  $check1 = mysqli_query($con,$table1);

  if (!$check1) {                        // if table userbase doesn't exist

    $create1 = "CREATE TABLE userbase (   
    user_id int(50) NOT NULL AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    name     varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    phone    bigint(50) NOT NULL,
    email    varchar(50) NOT NULL,
    datetym  varchar(50) NOT NULL,
    PRIMARY KEY(user_id) )";      
    
    $ok1 = mysqli_query($con,$create1);
  	if (!$ok1) {
  		echo 'error ';
  	}else
    { echo 'table created successfully';  }
  }
$table2 = " select * from questions";
  $check2 = mysqli_query($con,$table2);
  
  if (!$check2) {                         // same logic as above

    $create2 = "CREATE TABLE questions (
    id   int(50) NOT NULL AUTO_INCREMENT,
    content   varchar(10000) NOT NULL,
    title     varchar(500) NOT NULL,
    officer       varchar(50) NOT NULL,
    department    varchar(50) NOT NULL,
    locality  varchar(50) NOT NULL,
    username  varchar(50) NOT NULL,
    datetym   varchar(50) NOT NULL ,
    PRIMARY KEY(id))";
    $ok2 = mysqli_query($con,$create2);
    if (!$ok2) {
      echo 'error que';
    }else
    { echo 'table created successfully';  }
  }

$table3 = " select * from answers";
  $check3 = mysqli_query($con,$table3);
  
  if (!$check3) {                           // same logic as above

    $create3 = "CREATE TABLE answers (
    aid   int(50) NOT NULL AUTO_INCREMENT,
    id    int(50) NOT NULL,
    content    text(10000) NOT NULL,
    username   varchar(50) NOT NULL,
    datetym    varchar(50) NOT NULL,
    PRIMARY KEY(aid) )";
    $ok3 = mysqli_query($con,$create3);
    if (!$ok3) {
      echo 'error answers';
    }else
    { echo 'table created successfully';  }
  }

$table4 = " select * from admin";
  $check4 = mysqli_query($con,$table4);
  
  if (!$check4) {                               // once again

    $create4 = "CREATE TABLE admin (
    login_id varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    superpassword varchar(50) NOT NULL)";
    $ok4 = mysqli_query($con,$create4);
    if (!$ok4) {
      echo 'error admin ';
    }else
    { echo 'table created successfully';  }
  }


$admin_check_query = "SELECT login_id FROM admin ";
$admin_check_result = mysqli_query($con, $admin_check_query);

$admin_check_row = mysqli_fetch_array($admin_check_result, MYSQLI_ASSOC);

if(! $admin_check_row) {        //entering data for admin

  $admin_info = "INSERT INTO admin (login_id,password,superpassword)  
  VALUES ('priyanshu','shakti','jan')";
  $check5 = mysqli_query($con,$admin_info);
  if(!$check5){
    echo 'admin not created';
  }
}

?>
