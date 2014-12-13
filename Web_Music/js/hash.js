/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var hash={'#SignIn':'SignIn','#!':'firstPage','#aaa':'aaa','#SignUp':'signup'};

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
            
            
function signup(){
('#center').html('<div class="container">\
<div class="row">\
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">\
		<form role="form">\
			<h2>Please Sign Up<small>Its free and always will be.</small></h2>\
			<hr class="colorgraph">\
			<div class="row">\
				<div class="col-xs-12 col-sm-6 col-md-6">\
					<div class="form-group">\
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">\
					</div>\
				</div>\
				<div class="col-xs-12 col-sm-6 col-md-6">\
					<div class="form-group">\
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">\
					</div>\
				</div>\
			</div>\
			<div class="form-group">\
				<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3">\
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
				<div class="col-xs-12 col-sm-6 col-md-6">\
					<div class="form-group">\
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">\
					</div>\
				</div>\
			</div>\
			<div class="row">\
				<div class="col-xs-4 col-sm-3 col-md-3">\
					<span class="button-checkbox">\
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>\
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">\
					</span>\
				</div>\
				<div class="col-xs-8 col-sm-9 col-md-9">\
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.\
				</div>\
			</div>	\
			<hr class="colorgraph">\
			<div class="row">\
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>\
				<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>\
			</div>\
		</form>\
	</div>\
</div>\
<!-- Modal -->\
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
	<div class="modal-dialog modal-lg">\
		<div class="modal-content">\
			<div class="modal-header">\
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>\
			</div>\
			<div class="modal-body">\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>\
			</div>\
			<div class="modal-footer">\
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>\
			</div>\
		</div><!-- /.modal-content -->\
	</div><!-- /.modal-dialog -->\
</div><!-- /.modal -->\
</div>');
    
    
 
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