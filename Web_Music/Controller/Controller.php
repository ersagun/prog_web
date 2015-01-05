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
                'insertUser'=>'insertUser',
                'findSongs'=>'findSongs'
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

                return "404 !";
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
    
    public function findSongs(){
        $tab=Track::findByArtistId($_POST["artist_id"]);
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
    public function signIn(){    
         $user = new User();
        $user->username = $_POST['username'];
        $user->password = md5($_POST['password']);
        $verif = User::compareUser($user);
        if($verif->username == ""){
            echo "error_username";
        }
        else{
            if($user->password == $verif->password){
                echo $user->username;
                $_SESSION['username'] = $user->username;
            }
            else{
                echo "error_password";
            }
        }
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
         $user = new User();
        $user->username = $_POST['username'];
        $user->password = md5($_POST['password']);
        $user->email = $_POST['email'];
        $verif = User::compareUser($user);
        if($verif->username == ""){
            $res = $user->insert();
            $_SESSION['username'] = $user->username;
            echo $user->username;
        }
        else{
            echo "error";
        }
    }
    
    /**
     * 
     * @param type $req
     * 
     * Function called in each acces to Controller.php
     */
    public static function main($req){
        $control=new Controller();
        $control->callAction($req);
    }
    
        }

Controller::main($_REQUEST);
