<?php

class playlists_tracks {
 
private $playlist_id;
private $position;
private $track_id;
 
  public function __construct() {
    // rien à faire
  }
 

  public function __toString() {
        return "[". __CLASS__ . "] playlist_id : ". $this->playlist_id . ":
                   position  ". $this->position  .":
                   track_id ". $this->track_id ;
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
   
    if (!isset($this->playlist_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
    } 
 
    try {
 
        $c = Base::getConnection();
        $query = $c->prepare( "update playlists_tracks set position = :position, track_id = :track_id
                                       where playlist_id = :playlist_id");    
        /* 
         * liaison des paramêtres : 
        */
        $query->bindParam (':position', $this->position, PDO::PARAM_INT);
        $query->bindParam (':track_id', $this->track_id, PDO::PARAM_INT);
        $query->bindParam (':playlist_id', $this->playlist_id, PDO::PARAM_INT); 
        
        $nb = $query->execute();
        return $nb ;
    }
    catch (PDOException $e) {
        print $e->getMessage() ;
    }
  }
 
 
  public function delete() {
   
    if (!isset($this->playlist_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
    }
     
    
    try {
        $c = Base::getConnection();
        $query = $c->prepare("delete from playlists_tracks where playlist_id = :playlist_id");
        $query->bindParam(':playlist_id', $this->playlist_id, PDO::PARAM_INT);
        $nb=$query->execute();
        return $nb;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    } 
}
         
   
    public function insert() {
        if (!isset($this->playlist_id)) {
          throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }
        try{
            $c = Base::getConnection();
            $query = "insert into playlists_tracks values (:playlist_id,:position,:track_id)";
            $query->bindParam (':playlist_id', $this->playlist_id, PDO::PARAM_INT);
            $query->bindParam(':position', $this->position, PDO::PARAM_INT);             
            $query->bindParam (':track_id', $this->track_id, PDO::PARAM_INT);

            $nb=$pdo->exec($query);
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 



    public static function findByPlaylist_id($playlist_id) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from playlists_tracks where playlist_id=:playlist_id") ;
          $query->bindParam(':playlist_id', $playlist_id, PDO::PARAM_INT);
          $dbres = $query->execute();
 
          $d = $query->fetch(PDO::FETCH_BOTH);
           
          $nb = new playlists_tracks();
          $nb->playlist_id = $d['playlist_id'];
          $nb->position = $d['position'];
          $nb->track_id = $d['track_id'];
          return $nb;
  
    }
  
     
    public static function findAll() {
   
      $c = Base::getConnection();
      $query = "select * from playlists_tracks";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $position = $ligne['position'];
        $track_id = $ligne['track_id'];
        $playlist_idd = $ligne['playlist_id'];
        $obj = new playlists_tracks();
        $obj->position =$position;
        $obj->track_id=$track_id;
        $obj->playlist_id=$playlist_idd;
        array_push($res,$obj);
      }
      return $res;
    }
        
}