<?php
require_once("base.php");

        
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Artist{

public static function findAllArtist(){
$tab;
$query="Select * from artists";
$result=  mysql_query($query);
echo $result;
$i=0;
while($row=  mysql_fetch_array($result)){
    $i=$i+1;
    $tab[$i]=$row["image_url"];
}

return $tab;

}
}
