/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var hash={'#SignIn':'SignIn','#!':'firstPage','#aaa':'aaa'};

$(document).ready(function(){    
    
    console.log("cococcocuciocu");
   
    /**
     * Listen for hash changes.
     */   
    /** if(location.hash && hash[location.hash]!== -1){
         console.log("ok"+location.hash);
      
        updateMyApp(window.location.hash.substring(1));
        setLocationHash(window.location.hash.substring(1)); 
        console.log(location.hash);
     }else{
        console.log("nn"+location.hash);
        $('#center').html('<p>404 not found</p>');
        }
    **/
    
    window.onhashchange = function() {updateMyApp(getLocationHash());}
     //setInterval(updateMyApp(getLocationHash(),500));
     
     
     if(location.hash){
         updateMyApp(getLocationHash());
     }
});


  /**
     * Called to change the state of my app based on specified value.
     */
    function updateMyApp(value) {       
        var funct=hash[location.hash];
        eval(funct+'()');
        console.log(location.hash);    
        setLocationHash(value);      
    }
    
 
 
    
     //Returns the value of the location hash.
    
    function getLocationHash () {
        return window.location.hash.substring(1);
    }
    
    
    
    
    /**
     * Called by my app to update location hash.
     */
    function setLocationHash(str) {
        window.location.hash = str;
    }
 
    function SignIn(){     
        console.log('ok');
      $("#center").html('<div class="container">\
      <form class="form-signin" role="form">\
        <h2 class="form-signin-heading">Please sign in</h2>\
        <label for="inputEmail" class="sr-only">Email address</label>\
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">\
        <label for="inputPassword" class="sr-only">Password</label>\
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">\
        <div class="checkbox">\
          <label>\
            <input type="checkbox" value="remember-me"> Remember me\
          </label>\
        </div>\
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>\
      </form>\
    </div> <!-- /container -->');
        }
    
    
    
    function aaa(){
        $("#center").html("<p>haha</p>");
    }
    
    
    function firstPage(){
        console.log
            $.ajax({ 
                type: "GET", 
                url: "../Controller/Controller.php", 
                data: "a=allArtist",
                dataType:"text",
                error: function() { 
                    console.log("erreur !"); 
                },
                success: function(retour){
                    var ff=10;
                    $("#center").empty();
                    for(i=0;i<=1;i++){
                        $("#center").append('<div class="row"><div class="col-sm-6 col-md-4"><div class="thumbnail"><img data-src="holder.js/300x300" alt="..."><div class="caption">\
                        <h3>Thumbnail label</h3>\
                        <p>looooooooooooool</p>\
                        <p><a href="#aaa" class="btn btn-primary" role="button">Button1</a> <a href="#" class="btn btn-default" role="button">Button2</a></p>\
                        </div>\
                        </div>\
                        </div><p>'+retour+'</p>');
                    ff=ff*10;
                    } 
                }
            }); 
    }
    
    
    
    

/**
    setInterval(manageHash,500);

    function manageHash(){
    if(window.location.hash) {
      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      alert ("hahahaah : "+hash);
      // hash found
  } else {
      // No hash found

        }
    }}];
 **/