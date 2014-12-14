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


$t;
$query="Select * from artists";
//$result=  mysql_query($query);
$dbh = new PDO('mysql:host=localhost;dbname=music', $dbuser, $dbpass);
$i=0;
$tabPrincipale;
foreach($dbh->query($query) as $row){
    $url[$i]=$row["image_url"];
    $name[$i]=$row["name"];
    //echo($t[$i]);
    $i++;
}
$tabP[0]=$url;
$tabP[1]=$name;
return $tabP;

}
}
