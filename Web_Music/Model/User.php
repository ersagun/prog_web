<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */class User implements JsonSerializable{
     private $user_id;
private $username;
private $password;
private $email;
   
  public function __construct() {
    // rien à faire
  }
 

  public function __toString() {
        return "[". __CLASS__ . "] user_id : ". $this->user_id . ":
                   username  ". $this->username  .":
                   password ". $this->password
                   . " :email ". $this->email ;
  }
 
    
   public function __get($attr_name) {
    if (property_exists( __CLASS__, $attr_name)) { 
      return $this->$attr_name;
    } 
    $emess = __CLASS__ . ": unknown member $attr_name (getAttr)";
    throw new Exception($emess, 45);
  }
   

    public function __set($attr_name, $attr_val) {
     
    if (property_exists( __CLASS__, $attr_name)) { 
      $this->$attr_name=$attr_val;
    }
    $emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
     
  }
 

  public function update() {
   
    if (!isset($this->id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
    } 
 
    try {
 
        $c = Base::getConnection();
        $query = $c->prepare( "update users set username = :username, password = :password, email = :email
                                       where user_id = :user_id");    
        /* 
         * liaison des paramêtres : 
        */
        $query->bindParam (':username', $this->username, PDO::PARAM_STR);
        $query->bindParam (':password', $this->password, PDO::PARAM_STR);
        $query->bindParam (':email', $this->email, PDO::PARAM_STR);
        $query->bindParam (':user_id', $this->user_id, PDO::PARAM_INT); 
        
        $nb = $query->execute();
        return $nb ;
    }
    catch (PDOException $e) {
        print $e->getMessage() ;
    }
  }
 
 
  public function delete() {
   
    if (!isset($this->id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
    }
     
    
    try {
        $c = Base::getConnection();
        $query = $c->prepare("delete from users where user_id= :user_id");
        $query->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $nb=$query->execute();
        return $nb;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    } 
}
         
   
    public function insert() {
        if (!isset($this->id)) {
          throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }
        try{
            $c = Base::getConnection();
            $query = "insert into users values (NULL,:username,:password,:email)";
            $query->bindParam(':username', $this->username, PDO::PARAM_STR);             
            $query->bindParam (':password', $this->password, PDO::PARAM_STR);
            $query->bindParam (':email', $this->email, PDO::PARAM_STR);

            $nb=$pdo->exec($query);
            $this->__set("user_id", $pdo->lastInsertId());
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 



    public static function findByUserId($user_id) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from users where user_id=:user_id") ;
          $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
          $dbres = $query->execute();
 
          $d = $query->fetch(PDO::FETCH_BOTH);
           
          $nb = new User();
          $nb->user_id = $d['user_id'];
          $nb->username = $d['username'];
          $nb->password = $d['password'];
          $nb->email = $d['email'];
          return $nb;
  
    }
  
    
    public static function compareUser($user) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from user where username=:username") ;
          $query->bindParam(':username', $user->username, PDO::PARAM_STR);
          $query->bindParam (':password', $user->password, PDO::PARAM_STR);
          $query->bindParam (':email', $user->email, PDO::PARAM_STR);
          $query->bindParam (':user_id', $user->user_id, PDO::PARAM_INT); 
          $dbres = $query->execute();
          $d = $query->fetch(PDO::FETCH_BOTH);          
          $nb = new User();
          $nb->user_id = $d['user_id'];
          $nb->username = $d['username'];
          $nb->password = $d['password'];
          $nb->email = $d['email'];
          return $nb;
    }
    
    
    
     
    public static function findAll() {
   
      $c = Base::getConnection();
      $query = "select * from users";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $username = $ligne['username'];
        $password = $ligne['password'];
        $email = $ligne['email'];
        $user_id = $ligne['user_id'];
        $obj = new users();
        $obj->username =$username;
        $obj->password=$password;
        $obj->email=$email;
        $obj->user_id=$user_id;
        array_push($res,$obj);
      }
      return $res;
    }
  
 }
