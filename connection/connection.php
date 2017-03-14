<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';




$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);



$mysql_db = 'inspireme';

$select_db = mysqli_select_db($con, $mysql_db);


if (!$con && !$select_db) {
    die(mysqli_error());
} 


