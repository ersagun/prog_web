<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Playlist
 *
 */
class Playlist implements JsonSerializable{

private $user_id;
private $playlist_id;
private $playlist_name; 

   
  public function __construct() {
  }
 
  /**
   * 
   * @return type
   * Return a string with playlist informations
   */
  public function __toString() {
        return "[". __CLASS__ . "] user_id : ". $this->user_id . ":
                   playlist_id  ". $this->playlist_id  .":
                   playlist_name ". $this->playlist_name;
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
 * Update a playlist
 */
  public function update() {
   
    if (!isset($this->user_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
    } 
 
    try {
 
        $c = Base::getConnection();
        $query = $c->prepare( "update playlists set playlist_id = :playlist_id, playlist_name = :p_name
                                       where user_id = :user_id");    
        /* 
         * liaison playlist paramêtres : 
        */
        $query->bindParam (':playlist_id', $this->playlist_id, PDO::PARAM_STR);
        $query->bindParam (':p_name', $this->playlist_name, PDO::PARAM_STR);
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
  * Delete a playlist
  */
  public function delete() {
   
    if (!isset($this->user_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
    }
     
    
    try {
        $c = Base::getConnection();
        $query = $c->prepare("delete from playlists where user_id= :user_id");
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
    * @throws Exception
    * Insert a playlist
    */
    public function insert() {
        if (!isset($this->user_id)) {
          throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }
        try{
            $c = Base::getConnection();
            $query = "insert into playlists values (user_id,NULL,:p_name)";
            $query->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);             
            $query->bindParam (':p_name', $this->playlist_name, PDO::PARAM_STR);

            $nb=$pdo->exec($query);
            $this->__set("playlist_id", $pdo->lastInsertplaylist_id());
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 


    /**
     * 
     * @param type $playlist_id
     * @return \playlists
     * Find a playlist by playlist id
     */
    public static function findByplaylist_id($playlist_id) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from playlists where playlist_id=:playlist_id") ;
          $query->bindParam(':playlist_id', $playlist_id, PDO::PARAM_INT);
          $dbres = $query->execute();
 
          $d = $query->fetch(PDO::FETCH_BOTH);
           
          $nb = new playlists();
          $nb->user_id = $d['user_id'];
          $nb->playlist_id = $d['playlist_id'];
          $nb->playlist_name = $d['playlist_name'];
          return $nb;
  
    }
  
     /**
      * 
      * @return array
      * Find all playlists
      */
    public static function findAll() {
   
      $c = Base::getConnection();
      $query = "select * from playlists";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $playlist_id = $ligne['playlist_id'];
        $playlist = $ligne['playlist_name'];
        $user_idd = $ligne['user_id'];
        $obj = new playlists();
        $obj->playlist_id =$playlist_id;
        $obj->playlist_name=$playlist;
        $obj->user_id=$user_idd;
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
  
