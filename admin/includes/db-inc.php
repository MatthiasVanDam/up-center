<?php

$db_host='localhost';
$db_user='root';
$db_pwd='';
$db_name='up-center';

$con=mysqli_connect($db_host,$db_user,$db_pwd,$db_name);

if(!$con){
    die('Connection failed: '.mysqli_connect_error());
}


?>