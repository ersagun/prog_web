/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * @type type
 * 
 * @author ersagun
 * 
 * This class check the URL and manage generate the page 
 * thank's to the url hash
 */

// i allow my application to show only these hash names (hash name : function name)
var hash={'#SignIn':'signIn','#!':'allMusic','#AllArtist':'allArtist','#SignUp':'signUp','#AllMusic':'allMusic','#CheckUser':'checkUser'};

/**
 * 
 * @param {type} param
 * I check the page that user ask if is exist in my hash name table so i call the function
 * wich will show it else, i show the first page (#!)
 */
$(document).ready(function(){
   
    if(location.hash && ($.inArray(getLocationHash(),hash)!=-1)){
        updateMyApp(getLocationHash());
    }else{
        location='#AllMusic';
    }
    
    
    window.onhashchange = function() {updateMyApp(getLocationHash());}
    });
    
/**
 * Called to change the state of my app based on specified value.
 */
function updateMyApp(value) {       
    var funct=hash[location.hash];
    eval(funct+'()');   
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

/**
 * 
 * @returns {undefined}
 * This function called when hash begin signin
 */
function signIn(){     
    $('#center').html('<div class="container">\
<div class="row">\
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">\
        <form role="form" id="loginform" action="../Controller/Controller.php" method="POST" >\
            <h2>Sign In</h2>\
            <hr class="colorgraph">\
            <div class="row">\
                <div class="col-xs-12 col-sm-6 col-md-6">\
                    <div class="form-group">\
                                         <input type="hidden" id="a" name="a" value="signIn">\
                                         <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="1">\
                    </div>\
                </div>\
            </div>\
            <div class="row">\
                <div class="col-xs-12 col-sm-6 col-md-6">\
                    <div class="form-group">\
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">\
                    </div>\
                </div>\
            </div>\
            <hr class="colorgraph">\
            <div class="row">\
                <div class="col-xs-12 col-md-6"><input type="submit" id="submitt" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>\
            </div>\
        </form>\
    </div>\
</div>\
</div>');
}

/**
 * 
 * @returns {undefined}
 * Function show allArtist when hash is allArtist
 */
function allArtist(){
    $.ajax({ 
        type: "POST", 
        url: "../Controller/Controller.php", 
        data: "a=allArtist",
        dataType:"json",
        error: function() { 
            console.log("erreur !"); 
        },
        success: function(retour){
            
            $("#center").empty();
            
            $("#center").append('<div class="row" style="text-align:center;"><div class="col-sm-6 col-md-4">');
            
            for(i=0;i<retour.length;i++){
                
                $("#center").append('<div id="artist" class="thumbnail"><img  data-src="holder.js/300x300" src="'+retour[i].image_url+'" alt="artist" style="height:150px;width:150px;"><div class="caption">\
                        <h3>'+retour[i].name+'</h3>\
                        <p style="width:220px;text-align:justify">'+retour[i].info.substring(0,75)+'</p>\
                        <p><button class="btn btn-primary" role="button" onclick="searchBar(\''+retour[i].name+'\')">See</button></p>\
                        </div>\
                        </div>');
                
            } 
            $("#center").append('</div>');
        }
    }); 
}

/**
 * 
 * @returns {undefined}
 * Function show all musics when hash is all music
 */
function allMusic(){
    $.ajax({ 
        type: "POST", 
        url: "../Controller/Controller.php", 
        data: "a=allMusic",
        dataType:"json",
        error: function() { 
            console.log("erreur !"); 
        },
        success: function(retour){
            console.log("haha");
            
            $("#center").empty();
            
            $("#center").append('<div class="row" style="text-align:center;"><div class="col-sm-6 col-md-4">');
            
            for(i=0;i<retour.length;i++){
                
                $("#center").append('<div id="music" class="thumbnail"><img class="imgBlock" data-src="holder.js/300x300" src="'+retour[i].image_url+'" alt="artist" style="height:150px;widht:150px;"><div class="caption">\
                        <p>'+retour[i].title.substring(0,21)+'</p>\
                        <p style="width:300px;text-align:justify"></p>\
                        <p><span onclick="listenMusic(\''+retour[i].mp3_url+'\')" class="btn btn-primary" role="button">listen</span></p>\
                        </div>\
                        </div>');
                
            } 
            $("#center").append('</div>');
        }
    }); 
}

/**
 * 
 * @returns {undefined}
 * Function return sign up  when hash is sign up
 */
function signUp(){
    $('#center').html('<div class="container">\
<div class="row">\
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">\
		<form role="form" id="formSU" action="../Controller/Controller.php" method="POST" >\
			<h2>Please Sign Up <br><small>Its free and always will be.</small></h2>\
			<hr class="colorgraph">\
			<div class="row">\
				<div class="col-xs-12 col-sm-6 col-md-6">\
					<div class="form-group">\
                                         <input type="hidden" id="a" name="a" value="insertUser">\
                                         <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="1">\
					</div>\
				</div>\
			</div>\
			<div class="form-group">\
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">\
			</div>\
			<div class="row">\
				<div class="col-xs-12 col-sm-6 col-md-6">\
					<div class="form-group">\
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">\
					</div>\
				</div>\
			</div>\
			<hr class="colorgraph">\
			<div class="row">\
				 <div class="col-xs-12 col-md-6"><input type="submit" id="submitt" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>\
			</div>\
		</form>\
	</div>\
</div>\
</div>');    
}