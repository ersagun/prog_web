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
  }
 
/**
 * 
 * @return type
 * Function show a user
 */
  public function __toString() {
        return "[". __CLASS__ . "] user_id : ". $this->user_id . ":
                   username  ". $this->username  .":
                   password ". $this->password
                   . " :email ". $this->email ;
  }
 
    /**
     * 
     * @param type $attr_name
     * @return type
     * @throws Exception
     */
   public function __get($attr_name) {
    if (property_exists( __CLASS__, $attr_name)) { 
      return $this->$attr_name;
    } 
    $emess = __CLASS__ . ": unknown member $attr_name (getAttr)";
    throw new Exception($emess, 45);
  }
   
    /**
     * 
     * @param type $attr_name
     * @param type $attr_val
     */
    public function __set($attr_name, $attr_val) {
     
    if (property_exists( __CLASS__, $attr_name)) { 
      $this->$attr_name=$attr_val;
    }
    $emess = __CLASS__ . ": unknown member $attr_name (setAttr)";
     
  }
 
  /**
   * 
   * @return type
   * @throws Exception
   * Update a user
   */
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
 
 /**
  * 
  * @return type
  * @throws Exception
  * Delete a user
  */
  public function delete() {
   
    if (!isset($this->user_id)) {
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
         
   /**
    * 
    * @return type
    * Insert a user
    */
    public function insert() {
        try{
            $c = Base::getConnection();
            $query = $c->prepare("insert into users(user_id,username,password,email) values (NULL,:username,:password,:email)");
            $query->bindParam(':username', $this->username, PDO::PARAM_STR);             
            $query->bindParam (':password', $this->password, PDO::PARAM_STR);
            $query->bindParam (':email', $this->email, PDO::PARAM_STR);

            $nb = $query->execute();
            $this->__set("user_id", $c->lastInsertId());
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 


    /**
     * 
     * @param type $user_id
     * @return \User
     * Find by user id a user
     */
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
  
    /**
     * 
     * @param type $user
     * @return \User
     * compare a user gived on parameter
     */
    public static function compareUser($user) {
 
      $c = Base::getConnection();
      $c->exec("SET CHARACTER SET utf8");
          $query = $c->prepare("select * from users where username=:username or email=:email") ;
          $dbres = $query->execute(array(':username'=>$user->username,':email'=>$user->email));
          $d = $query->fetch(PDO::FETCH_BOTH);   
          if(isset($d["username"])){
          $nb = new User();
          $nb->user_id = $d['user_id'];
          $nb->username = $d['username'];
          $nb->password = $d['password'];
          $nb->email = $d['email'];
          }else{
           $nb = new User();  
           $nb->username ="";
          }
          return $nb;
    }
    
    
    
    /**
     * 
     * @return array
     * Find all users
     */
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
  // properties

    // function called when encoded with json_encode
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
