<?php
require_once("base.php");

        
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Artist{
 
private $artist_id;
private $name;
private $image_url;
private $info;
   
  public function __construct() {
    // rien à faire
  }
 
  public function __toString() {
        return "[". __CLASS__ . "] artist_id : ". $this->artist_id . ":
                   name  ". $this->name  .":
                   url ". $this->image_url
                   . " :information ". $this->info;
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
    public static function findByartist_id($artist_id) {
 
      $c = Base::getConnection();
          $query = $c->prepare("select * from artists where artist_id=:artist_id") ;
          $query->bindParam(':artist_id', $artist_id, PDO::PARAM_INT);
          $dbres = $query->execute();
 
          $d = $query->fetch(PDO::FETCH_BOTH);
           
          $nb = new artists();
          $nb->artist_id = $d['artist_id'];
          $nb->name = $d['name'];
          $nb->image_url = $d['image_url'];
          $nb->info = $d['info'];
          return $nb;
    }
  
     
    public static function findAll() {
   
      $c = Base::getConnection();
      $query = "select * from artists";
      $stmt = $c->prepare($query) ;
      $stmt->execute();
      $res = array();
      while ($ligne = $stmt->fetch(PDO::FETCH_BOTH)) 
      {
        $name = $ligne['name'];
        $image = $ligne['image_url'];
        $artist_idd = $ligne['artist_id'];
        $inf = $ligne['info'];
        $obj = new artists();
        $obj->name =$name;
        $obj->image_url=$image;
        $obj->artist_id=$artist_idd;
        $obj->info=$inf;
        array_push($res,$obj);
      }
      return $res;
    }
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
/**    
    
public static function findAllArtist(){
    
    $dbhost = 'localhost';
$dbname = 'music';
$dbuser = 'root';
$dbpass = '';


$t;
$query="Select * from artists";
//$result=  mysql_query($query);
$dbh = new PDO('mysql:host=localhost;dbname=music', $dbuser, $dbpass);
$i=0;
$tabPrincipale;
foreach($dbh->query($query) as $row){
    $url[$i]=$row["image_url"];
    $name[$i]=$row["name"];
    //echo($t[$i]);
    $i++;
}
$tabP[0]=$url;
$tabP[1]=$name;
return $tabP;

}

 */
}
