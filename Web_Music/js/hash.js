/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var hash={'#SignIn':'signIn','#!':'firstPage','#aaa':'aaa','#SignUp':'signup','#AllMusic':'allMusic','#listen':'listen'};

$(document).ready(function(){    
    console.log("in hash.js :");
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
 
    function signIn(){     
        console.log('ok');
        var strVar="";
strVar += "    <div class=\"container\">    ";
strVar += "        <div id=\"loginbox\" style=\"margin-top:50px;\" class=\"mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2\">                    ";
strVar += "            <div class=\"panel panel-info\" >";
strVar += "                    <div class=\"panel-heading\">";
strVar += "                        <div class=\"panel-title\">Sign In<\/div>";
strVar += "                        <div style=\"float:right; font-size: 80%; position: relative; top:-10px\"><a href=\"#\">Forgot password?<\/a><\/div>";
strVar += "                    <\/div>     ";
strVar += "";
strVar += "                    <div style=\"padding-top:30px\" class=\"panel-body\" >";
strVar += "";
strVar += "                        <div style=\"display:none\" id=\"login-alert\" class=\"alert alert-danger col-sm-12\"><\/div>";
strVar += "                            ";
strVar += "                        <form id=\"loginform\" class=\"form-horizontal\" role=\"form\">";
strVar += "                                    ";
strVar += "                            <div style=\"margin-bottom: 25px\" class=\"input-group\">";
strVar += "                                        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"><\/i><\/span>";
strVar += "                                        <input id=\"login-username\" type=\"text\" class=\"form-control\" name=\"username\" value=\"\" placeholder=\"username or email\">                                        ";
strVar += "                                    <\/div>";
strVar += "                                ";
strVar += "                            <div style=\"margin-bottom: 25px\" class=\"input-group\">";
strVar += "                                        <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-lock\"><\/i><\/span>";
strVar += "                                        <input id=\"login-password\" type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"password\">";
strVar += "                                    <\/div>";
strVar += "                                    ";
strVar += "";
strVar += "                                ";
strVar += "                            <div class=\"input-group\">";
strVar += "                                      <div class=\"checkbox\">";
strVar += "                                        <label>";
strVar += "                                          <input id=\"login-remember\" type=\"checkbox\" name=\"remember\" value=\"1\"> Remember me";
strVar += "                                        <\/label>";
strVar += "                                      <\/div>";
strVar += "                                    <\/div>";
strVar += "";
strVar += "";
strVar += "                                <div style=\"margin-top:10px\" class=\"form-group\">";
strVar += "                                    <!-- Button -->";
strVar += "";
strVar += "                                    <div class=\"col-sm-12 controls\">";
strVar += "                                      <a id=\"btn-login\" href=\"#\" class=\"btn btn-success\">Login  <\/a>";
strVar += "                                      <a id=\"btn-fblogin\" href=\"#\" class=\"btn btn-primary\">Login with Facebook<\/a>";
strVar += "";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "";
strVar += "";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <div class=\"col-md-12 control\">";
strVar += "                                        <div style=\"border-top: 1px solid#888; padding-top:15px; font-size:85%\" >";
strVar += "                                            Don't have an account! ";
strVar += "                                        <a href=\"#\" onClick=\"$('#loginbox').hide(); $('#signupbox').show()\">";
strVar += "                                            Sign Up Here";
strVar += "                                        <\/a>";
strVar += "                                        <\/div>";
strVar += "                                    <\/div>";
strVar += "                                <\/div>    ";
strVar += "                            <\/form>     ";
strVar += "";
strVar += "";
strVar += "";
strVar += "                        <\/div>                     ";
strVar += "                    <\/div>  ";
strVar += "        <\/div>";
strVar += "        <div id=\"signupbox\" style=\"display:none; margin-top:50px\" class=\"mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2\">";
strVar += "                    <div class=\"panel panel-info\">";
strVar += "                        <div class=\"panel-heading\">";
strVar += "                            <div class=\"panel-title\">Sign Up<\/div>";
strVar += "                            <div style=\"float:right; font-size: 85%; position: relative; top:-10px\"><a id=\"signinlink\" href=\"#\" onclick=\"$('#signupbox').hide(); $('#loginbox').show()\">Sign In<\/a><\/div>";
strVar += "                        <\/div>  ";
strVar += "                        <div class=\"panel-body\" >";
strVar += "                            <form id=\"signupform\" class=\"form-horizontal\" role=\"form\">";
strVar += "                                ";
strVar += "                                <div id=\"signupalert\" style=\"display:none\" class=\"alert alert-danger\">";
strVar += "                                    <p>Error:<\/p>";
strVar += "                                    <span><\/span>";
strVar += "                                <\/div>";
strVar += "                                    ";
strVar += "                                ";
strVar += "                                  ";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <label for=\"email\" class=\"col-md-3 control-label\">Email<\/label>";
strVar += "                                    <div class=\"col-md-9\">";
strVar += "                                        <input type=\"text\" class=\"form-control\" name=\"email\" placeholder=\"Email Address\">";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "                                    ";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <label for=\"firstname\" class=\"col-md-3 control-label\">First Name<\/label>";
strVar += "                                    <div class=\"col-md-9\">";
strVar += "                                        <input type=\"text\" class=\"form-control\" name=\"firstname\" placeholder=\"First Name\">";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <label for=\"lastname\" class=\"col-md-3 control-label\">Last Name<\/label>";
strVar += "                                    <div class=\"col-md-9\">";
strVar += "                                        <input type=\"text\" class=\"form-control\" name=\"lastname\" placeholder=\"Last Name\">";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <label for=\"password\" class=\"col-md-3 control-label\">Password<\/label>";
strVar += "                                    <div class=\"col-md-9\">";
strVar += "                                        <input type=\"password\" class=\"form-control\" name=\"passwd\" placeholder=\"Password\">";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "                                    ";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <label for=\"icode\" class=\"col-md-3 control-label\">Invitation Code<\/label>";
strVar += "                                    <div class=\"col-md-9\">";
strVar += "                                        <input type=\"text\" class=\"form-control\" name=\"icode\" placeholder=\"\">";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "";
strVar += "                                <div class=\"form-group\">";
strVar += "                                    <!-- Button -->                                        ";
strVar += "                                    <div class=\"col-md-offset-3 col-md-9\">";
strVar += "                                        <button id=\"btn-signup\" type=\"button\" class=\"btn btn-info\"><i class=\"icon-hand-right\"><\/i> &nbsp Sign Up<\/button>";
strVar += "                                        <span style=\"margin-left:8px;\">or<\/span>  ";
strVar += "                                    <\/div>";
strVar += "                                <\/div>";
strVar += "                                ";
strVar += "                                <div style=\"border-top: 1px solid #999; padding-top:20px\"  class=\"form-group\">";
strVar += "                                    ";
strVar += "                                    <div class=\"col-md-offset-3 col-md-9\">";
strVar += "                                        <button id=\"btn-fbsignup\" type=\"button\" class=\"btn btn-primary\"><i class=\"icon-facebook\"><\/i>   Sign Up with Facebook<\/button>";
strVar += "                                    <\/div>                                           ";
strVar += "                                        ";
strVar += "                                <\/div>";
strVar += "                                ";
strVar += "                                ";
strVar += "                                ";
strVar += "                            <\/form>";
strVar += "                         <\/div>";
strVar += "                    <\/div>";
strVar += "";
strVar += "               ";
strVar += "               ";
strVar += "                ";
strVar += "         <\/div> ";
strVar += "    <\/div>";
strVar += "    ";

      $("#center").html(strVar);
        }
    
    
    
    function aaa(){
        $("#center").html("<p>haha</p>");
    }
    
    
    function firstPage(){
        console.log('firstpage');
            $.ajax({ 
                type: "POST", 
                url: "../Controller/Controller.php", 
                data: "a=allArtist",
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

                    $("#center").append('<div class="row" style="text-align:justify;"><div class="col-sm-6 col-md-4">');
                
                    for(i=0;i<retour.length;i++){
                        var mp3=retour[i].mp3_url;
                        var mp3sec=mp3.substring(35,mp3.length-4);
                        $("#center").append('<div class="thumbnail" style="vertical-align:top; *display: inline;zoom: 1"><img data-src="holder.js/300x300" src="'+retour[i].image_url+'" alt="artist" style="height:300px;widht:300px;"><div class="caption">\
                        <h3>'+retour[i].title+'</h3>\
                        <p style="width:300px;text-align:justify"></p>\
                        <p><span onclick="lm(\'http:\/\/freedownloads.last.fm\/download'+mp3sec+'.mp3\')" class="btn btn-primary" role="button">listen</span></p>\
                        </div>\
                        </div>');
                     
                    } 
                    $("#center").append('</div>');
                }
            }); 
        }
            
            
function signup(){
$('#center').html('<div class="container">\
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
    }
    
   