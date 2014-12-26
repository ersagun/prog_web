/*
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
 */
/* 
    Created on : 07-Dec-2014, 16:21:17
    Author     : ersagun
 */

/*Start*/
$(document).ready(function(){
   
    if(location.hash){
        updateMyApp(getLocationHash());
    }else{
        location='#!';
    }
 
   // Lorsque je soumets le formulaire
    $('#formSU').on('submit', function(e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
 
        var $this = $(this); // L'objet jQuery du formulaire
 
        // Je récupère les valeurs
        var a = $('#a').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
 
        // Je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(username === '' || password === ''|| email === '') {
            alert('Les champs doivent êtres remplis');
        } else {
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                dataType : 'text',
                error: function() { 
             $("#center").empty();
            $("#center").append('<p>Erreur il existe un utilisateur avec ce username ou mdp ! </p>'); 
        },
                success: function(html) { // Je récupère la réponse du fichier PHP
                     $("#center").empty();
            $("#center").append('<p>Monsieur'+html+' vous etes bien inscrit ! </p>');    
                }
            });
        }
    });
   
    window.onhashchange = function() {updateMyApp(getLocationHash());}
    //setInterval(updateMyApp(getLocationHash(),500));
    
    
});


function searchBar(val){
    $.ajax({ 
        type: "GET", 
        url: "../Controller/Controller.php", 
        data: "a=search&like="+val+"",
        dataType:"json",
        error: function() { 
            console.log("erreur !"); 
        },
        success: function(retour){
            $("#center").empty();

            $("#center").append('<div class="row" style="text-align:justify;"><div class="col-sm-6 col-md-4">');
                
            for(i=0;i<retour.length;i++){
                        
                $("#center").append('<div class="thumbnail" style="margin-left:6px;float: left;width: 350px;height:325px;vertical-align:top; display: inline-block;zoom: 1"><img data-src="holder.js/300x300" src="'+retour[i].image_url+'" alt="artist" style="height:200px;widht:200px;"><div class="caption">\
                        <h3>'+retour[i].title.substring(0,21)+'</h3>\
                        <p style="width:300px;text-align:justify"></p>\
                        <p><span onclick="listenMusic(\''+retour[i].mp3_url+'\')" class="btn btn-primary" role="button">Listen</span></p>\
                        </div>\
                        </div>');    
            }
            $("#center").append('</div>');
        }
    }); 
    }

function listenMusic(val){ 
    var player=document.getElementById('player');
    var sourceMp3=document.getElementById('srcMp3');
    $("#player").attr("src",val);
    $('#metaSong').attr("content",val);
    player.load(); //just start buffering (preload)
    player.play(); //start playing
}


function checkUser(){
        data= $("#formSignUp").serialize();
        console.log('Val :::'+data);
        $.ajax({ 
        type: "POST", 
        url: "../Controller/Controller.php", 
        data: data,
        dataType:"text",
        error: function() { 
            console.log("erreur !"); 
        },
        success: function(retour){
            $("#center").empty();

            $("#center").append('<p>checked'+retour+'</p>');
        }
    }); 
location='#CheckUser';
}