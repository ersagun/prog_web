<?php
require_once("Base.php");
    
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
     
//setup php for working with Unicode data
/**
 * Description of Artist
 *
 */
class Artist implements JsonSerializable{
    
private $artist_id;
private $name;
private $image_url;
private $info;
private $mp3_url;
private $title;
    
  public function __construct() {
  }
      
  /**
   * 
   * @return type
   * this function return a string present an artist
   */
  public function __toString() {
        return "[". __CLASS__ . "] artist_id : ". $this->artist_id . ":
                   name  ". $this->name  .":
                   url ". $this->image_url
                   . " :information ". $this->info;
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
   * Update an artist on db
   */
  public function update() {
      
    if (!isset($this->artist_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot update");
    } 
        
    try {
        
        $c = Base::getConnection();
        $query = $c->prepare( "update artists set name = :name, image_url = :image, info = :info
                                       where artist_id = :artist_id");    
        /* 
         * liaison image paramêtres : 
        */
        $query->bindParam (':name', $this->name, PDO::PARAM_STR);
        $query->bindParam (':image', $this->image_url, PDO::PARAM_STR);
        $query->bindParam (':info', $this->info, PDO::PARAM_STR);
        $query->bindParam (':artist_id', $this->artist_id, PDO::PARAM_INT); 
            
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
  * Delete an artist on db
  */
  public function delete() {
      
    if (!isset($this->artist_id)) {
        throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
    }
        
        
    try {
        $c = Base::getConnection();
        $query = $c->prepare("delete from artists where artist_id= :artist_id");
        $query->bindParam(':artist_id', $this->artist_id, PDO::PARAM_INT);
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
    * Insert an artist on db
    */
    public function insert() {
        if (!isset($this->artist_id)) {
          throw new Exception(__CLASS__ . ": Primary Key undefined : cannot delete");
        }
        try{
            $c = Base::getConnection();
            $query = "insert into artists values (NULL,:name,:image,:info)";
            $query->bindParam(':name', $this->name, PDO::PARAM_STR);             
            $query->bindParam (':image', $this->image_url, PDO::PARAM_STR);
            $query->bindParam (':info', $this->info, PDO::PARAM_STR);
            $nb=$pdo->exec($query);
            $this->__set("artist_id", $pdo->lastInsertartist_id());
            return $nb;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    } 
        
    /**
     * 
     * @param type $artist_id
     * @return \Artist
     * Find an artist on db by id
     */
    public static function findByartist_id($artist_id) {
        
      $c = Base::getConnection();
          $query = $c->prepare("select * from artists where artist_id=:artist_id") ;
          $query->bindParam(':artist_id', $artist_id, PDO::PARAM_INT);
          $dbres = $query->execute();
              
          $d = $query->fetch(PDO::FETCH_BOTH);
              
          $nb = new Artist();
          $nb->artist_id = $d['artist_id'];
          $nb->name = $d['name'];
          $nb->image_url = $d['image_url'];
          $nb->info = $d['info'];
          return $nb;
    }
        
    /**
     * 
     * @return array
     * Return an array of artist
     */
    public static function findAll() {
        
      $c = Base::getConnection();
      $query = "select * from artists order by name";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $name = $ligne['name'];
        $image = $ligne['image_url'];
        $artist_idd = $ligne['artist_id'];
        $inf = $ligne['info'];
        $obj = new Artist();
        $obj->name =$name;
        $obj->image_url=$image;
        $obj->artist_id=$artist_idd;
        $obj->info=$inf;
        array_push($res,$obj);
      }
      return $res;
    }
        
    /**
     * 
     * @param type $val
     * @return array
     * Find an artist or tracks by the singer name or a song by title name
     */
    public static function findArtistTrackLike($val) {
        
      $c = Base::getConnection();
      $query = "select * from artists as a left join tracks as t on a.artist_id=t.artist_id  where t.title LIKE '".$val."%' OR a.name LIKE '".$val."%' UNION select * from artists as a right join tracks as t on a.artist_id=t.artist_id  where t.title LIKE '".$val."%' OR a.name LIKE '".$val."%'";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $name = $ligne['name'];
        $image = $ligne['image_url'];
        $artist_idd = $ligne['artist_id'];
        $inf = $ligne['info'];
        $url=$ligne["mp3_url"];
        $title=$ligne["title"];
        $obj = new Artist();
        $obj->name =$name;
        $obj->image_url=$image;
        $obj->artist_id=$artist_idd;
        $obj->info=$inf;
        $obj->mp3_url=$url;
        $obj->title=$title;
        array_push($res,$obj);
      }
      return $res;
          
    }
        
        // properties
            
    // function called when encoded with json_encode
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}