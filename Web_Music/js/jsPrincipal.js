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
    if(!location.hash){
        location='#!';
    }
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
                    console.log("haha");
                    
                    $("#center").empty();

                    $("#center").append('<div class="row" style="text-align:justify;"><div class="col-sm-6 col-md-4">');
                
                    for(i=0;i<retour.length;i++){
                        
                        $("#center").append('<div class="thumbnail" style="vertical-align:top; *display: inline;zoom: 1"><img data-src="holder.js/300x300" src="'+retour[i].image_url+'" alt="artist" style="height:300px;widht:300px;"><div class="caption">\
                        <h3>'+retour[i].name+'</h3>\
                        <p style="width:300px;text-align:justify">'+retour[i].info.substring(0,100)+'</p>\
                        <p><a href="#aaa" class="btn btn-primary" role="button">Button1</a> <a href="#" class="btn btn-default" role="button">Button2</a></p>\
                        </div>\
                        </div>');
                        
                    } 
                    $("#center").append('</div>');
                }
            }); 
        }
            function lm(val){ 
    //console.log(val);    
    //$('#player').html('<source src = "'+val+'" type = "audio/mpeg">\
    //<source src = "'+val+'" type = "audio/ogg">');
                
    //var audio = document.getElementById('player');
    //audio.load();
    //audio.play();
   // var source = document.getElementById('oggSource');
      //  source.src='audio/ogg/' + this.parentElement.getAttribute('data-value');
     var player=document.getElementById('player');
    var sourceMp3=document.getElementById('srcMp3');
    $("#player").attr("src",val);
    $('#metaSong').attr("content",val);
    
   player.load(); //just start buffering (preload)
   player.play(); //start playing
            
            }
