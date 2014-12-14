<?php
require_once("base.php");

        
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Artist{

public static function findAllArtist(){
    
    $dbhost = 'localhost';
$dbname = 'music';
$dbuser = 'root';
$dbpass = '';


$tab;
$query="Select * from artists";
//$result=  mysql_query($query);
$dbh = new PDO('mysql:host=localhost;dbname=music', $dbuser, $dbpass);
$i=0;
foreach($dbh->query($query) as $row){
    $t[$i]=$row;
    //echo($t[$i]);
    $i++;
}

return $t;

}
}
