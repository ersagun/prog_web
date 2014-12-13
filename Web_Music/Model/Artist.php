<?php
require_once("base.php");

        
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query="Select * from artists";
$result=  mysql_query($query);
while($row=  mysql_fetch_array($result)){
echo "<p id='txx'>".$row["name"]."</p>";
}
