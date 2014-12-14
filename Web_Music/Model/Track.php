<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tracks
 *
 * @author ersagun
 */
class Track {
  private $artist_id;
private $track_id;
private $title;
private $mp3_url;

   
  public function __construct() {
    // rien à faire
  }
 

  public function __toString() {
        return "[". __CLASS__ . "] :artist_id : ". $this->artist_id . 
                                  ":track_id  ". $this->track_id .
                                  ":title ". $this->title .
                                  " :mp3_url ". $this->mp3_url;
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
        $query = $c->prepare( "update tracks set artist_id = :artist_id, title = :title, mp3_url = :mp3_url
                                       where track_id = :track_id");    
        /* 
         * liaison des paramêtres : 
        */
        $query->bindParam (':artist_id', $this->artist_id, PDO::PARAM_INT);
        $query->bindParam (':title', $this->title, PDO::PARAM_STR);
        $query->bindParam (':mp3_url', $this->mp3_url, PDO::PARAM_STR);
        $query->bindParam (':track_id', $this->track_id, PDO::PARAM_INT); 
        
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
        $query = $c->prepare("delete from tracks where track_id= :track_id");
        $query->bindParam(':track_id', $this->track_id, PDO::PARAM_INT);
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
            $query = "insert into tracks values (:artist_id,NULL,:title,:mp3_url)";
            $query->bindParam(':artist_id', $this->artist_id, PDO::PARAM_INT);             
            $query->bindParam (':title', $this->title, PDO::PARAM_STR);
            $query->bindParam (':mp3_url', $this->mp, PDO::PARAM_STR);

            $nb=$pdo->exec($query);
            $this->__set("track_id", $pdo->lastInsertId());
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 



    public static function findByTrack_id($track_id) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from tracks where track_id=:track_id") ;
          $query->bindParam(':track_id', $track_id, PDO::PARAM_INT);
          $dbres = $query->execute();
 
          $d = $query->fetch(PDO::FETCH_BOTH);
           
          $nb = new tracks();
          $nb->track_id = $d['track_id'];
          $nb->artist_id = $d['artist_id'];
          $nb->title = $d['title'];
          $nb->mp3_url = $d['mp3_url'];
          return $nb;
  
    }
  
     
    public static function findAll() {
   
      $c = Base::getConnection();
      $query = "select * from tracks";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $track_id = $ligne['track_id'];
        $artist_id = $ligne['artist_id'];
        $title = $ligne['title'];
        $mp3_url = $ligne['mp3_url'];
        $obj = new tracks();
        $obj->track_id=$track_id;
        $obj->artist_id=$artist_id;
        $obj->title=$title;
        $obj->mp3_url=$mp3_url;
        array_push($res,$obj);
      }
      return $res;
    }
       
}
