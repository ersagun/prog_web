<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dbhost = 'localhost';
$dbname = 'music';
$dbuser = 'root';
$dbpass = '';

//mysql_connect($dbhost,$dbuser) or die ("Erreur MySQL : ".  mysql_error());
$dbh = new PDO('mysql:host=localhost;dbname=music', $dbuser, $dbpass);
//mysql_select_db($dbname) or die ("Erreur MySQL : ".  mysql_error());