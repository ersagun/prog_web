<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Base { 
    
    private static $dblink ;     
        
    /**
     * 
     * @return \PDO
     * This function connect to the db
     */
    private static function connect(){ 
        try{ 
            require_once ("config.php");
            $dsn="mysql:host=".$host.";"."dbname=".$dbname.";charset=utf8"; 
            $db = new PDO($dsn, 'root','',array( 
            PDO::ERRMODE_EXCEPTION=>true, 
            PDO::ATTR_PERSISTENT=>true 
            )); 
            $db->exec("set names utf8");
                
        } catch(PDOException $e) { 
            
            print $e->getMessage() ; 
        } 
            
        return $db; 
            
    } 
    /**
     * 
     * @return type
     * This function verify if the connection is successed or not, if the connection exist, function get it else, function 
     * call connect to connecting.
     */
    public static function getConnection(){ 
        if(isset(self::$dblink)){ 
            
            return self::$dblink ; 
                
        } else { 
            
            self::$dblink = self::connect(); 
            return self::$dblink ; 
                
        } 
    } 
} 