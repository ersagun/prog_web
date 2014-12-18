<?php
//require_once("../View/View.php");
//echo file_get_contents("../View/View.html");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author ersagun
 * 
 * This class used when user ask data
 */

require_once("../Model/Artist.php");
require_once("../Model/Track.php");
header('content-type: text/html; charset=utf-8');
class Controller {
    
    public function __construct(){
            $this->action=  array (
            'allArtist' => 'allArtist',
            'showArtist' => 'showArtist',
            'signIn' => 'signIn',
                'search'=>'search',
                'allMusic'=>'allMusic'
    
        );
    }
    
    
    public function callAction($param=null){
        

        
        if(isset($param["a"])) { // si $param contient

            if (array_key_exists($param["a"], $this->action)){
                $a = $this->action[$param['a']];

                return $this->$a($param);

            }else{

                return $this->defaut();
            }
        }else{

           //return defautPage();
        }
    }
   
    
    public function defaut(){
        echo "aaa";
    }

    public function showArtist(){
        echo "artist";
    }
    
    public function allArtist(){
        $tab=Artist::findAll(); 
        echo json_encode($tab);

    }
    
    public function allMusic(){
        $tab=Track::findAll(); 
        echo json_encode($tab);
    }
    public function SignIn(){
        
        echo "connecté";
    }
    
    public function search(){
        $tab=Artist::findArtistTrackLike($_GET['like']); 
        echo json_encode($tab);
    }
    

    public static function main($req){
        $control=new Controller();
        $control->callAction($req);
    }
    
        }

Controller::main($_REQUEST);
