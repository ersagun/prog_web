<?php
require_once("../Model/User.php");
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
    
    /**
     * Constructor of controller
     */
    public function __construct(){
            $this->action=  array (
            'allArtist' => 'allArtist',
            'showArtist' => 'showArtist',
            'signIn' => 'signIn',
                'search'=>'search',
                'allMusic'=>'allMusic',
                'insertUser'=>'insertUser'
    
        );
    }
    
    /**
     * 
     * @param type $param
     * @return type
     * 
     * This function called when a response Ajax adressed to Controller.php with Port or Get
     */
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
   
    /**
     * This function get all artists encode in json and transfer all artists in json to Ajax
     */
    public function allArtist(){
        $tab=Artist::findAll(); 
        echo json_encode($tab);

    }
    
    /**
     * Tranform all musics in json to Ajax
     */
    public function allMusic(){
        $tab=Track::findAll(); 
        echo json_encode($tab);
    }
    
    
    /**
     * Called when user want to sign in
     */
    public function SignIn(){    
        // To complete.
    }
    
    /**
     * Called when user search a sound via artist name or song name
     */
    public function search(){
        $tab=Artist::findArtistTrackLike($_GET['like']); 
        echo json_encode($tab);
    }
    
    /**
     * This function check user and insert if not exist
     */
    public function insertUser(){
        
    }
    
    /**
     * 
     * @param type $req
     * 
     * Fucntion called in each acces to Controller.php
     */
    public static function main($req){
        $control=new Controller();
        $control->callAction($req);
    }
    
        }

Controller::main($_REQUEST);
