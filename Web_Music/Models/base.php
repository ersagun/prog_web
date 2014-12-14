<?php 
  
class Base { 
  
    private static $dblink ;     
      
    private static function connect(){ 
        try{ 
          
            $dsn="mysql:host=localhost;dbname=musique" ; 
            $db = new PDO($dsn, 'root', '',array( 
            PDO::ERRMODE_EXCEPTION=>true, 
            PDO::ATTR_PERSISTENT=>true 
            )); 
              
        } catch(PDOException $e) { 
          
            print $e->getMessage() ; 
        } 
          
        return $db; 
          
    } 
  
    public static function getConnection(){ 
        if(isset(self::$dblink)){ 
          
            return self::$dblink ; 
              
        } else { 
          
            self::$dblink = self::connect() ; 
            return self::$dblink ; 
              
        } 
    } 
} 
?>