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

require_once("../View/View.php");
require_once("../Model/Artist.php");

class Controller {
    
    public function __construct(){
            $this->action=  array (
            'allArtist' => 'allArtist',
            'showArtist' => 'showArtist',
            'signIn' => 'signIn'
    
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
        $tab=Artist::findAllArtist();
        echo json_encode($tab[0]).json_encode($tab[1]);

    }
    public function SignIn(){
        
        echo "connecté";
    }
    

    public static function main($req){
        $control=new Controller();
        $control->callAction($req);
    }
    
        }

Controller::main($_REQUEST);
