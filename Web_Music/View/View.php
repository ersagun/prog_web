<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author ersagun
 */

class View {

/**var $p;**/

/**public function __construct($param){
$this->$p = $param;
}**/


public static function show(){
session_start();
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Musica Cloud</title>
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
		<link rel="stylesheet" href="../css/music.css" type="text/css"/>
		<script src="../js/jquery.js"></script> 
	</head>

	<body>
		<div id="all_content">
			<div id="slider">
				<!-- Start cssSlider.com -->
	<link rel="stylesheet" href="engine1/style.css">
	<!--[if IE]><link rel="stylesheet" href="engine1/ie.css"><![endif]-->
	<!--[if lte IE 9]><script type="text/javascript" src="engine1/ie.js"></script><![endif]-->
	
	<div class="csslider1 autoplay">
		<input name="cs_anchor1" id="cs_slide1_0" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_1" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_2" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_3" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_4" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_slide1_5" type="radio" class="cs_anchor slide" >
		<input name="cs_anchor1" id="cs_play1" type="radio" class="cs_anchor" checked>
		<input name="cs_anchor1" id="cs_pause1_0" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_1" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_2" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_3" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_4" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_5" type="radio" class="cs_anchor pause">
		
		<ul>
			<div>
				<img src="data1/images/headphonesgraymusic.jpg" style="width: 100%;">
			</div>
			<li class="num0 img">
				<img src="data1/images/headphonesgraymusic.jpg" alt="Headphones-Gray-Music" title="Headphones-Gray-Music" />
			</li>
			<li class="num1 img">
				<img src="data1/images/loveandmusic1.jpg" alt="love-and-music1" title="love-and-music1" />
			</li>
			<li class="num2 img">
				<img src="data1/images/music.jpg" alt="Music" title="Music" />
			</li>
			<li class="num3 img">
				<img src="data1/images/musiccloudheader.jpg" alt="MusicCloudHeader" title="MusicCloudHeader" />
			</li>
			<li class="num4 img">
				<img src="data1/images/musictree.jpg" alt="Music-Tree" title="Music-Tree" />
			</li>
			<li class="num5 img">
				<img src="data1/images/musicwallpapermusic3698618119201200.jpg" alt="Music-Wallpaper-music-36986181-1920-1200" title="Music-Wallpaper-music-36986181-1920-1200" />
			</li>
		
		</ul>
		</div>
		<!-- End cssSlider.com -->
			</div>
			<div ="navbar">
				 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!--<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- You"ll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you"ll find it) -->
          <!--<a class="navbar-brand" href="http://www.greatforexsignals.com/index.html"><img src="./Great Forex Signals_files/logo.png" width="334" height="50" alt="Great Forex Signals"></a>
        </div>-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://www.greatforexsignals.com/performance.html">Tous les musiques</a></li>
            <li><a href="http://www.greatforexsignals.com/pricing.html">Tous les artistes</a></li>
            <li><a href="http://www.greatforexsignals.com/faq.html">Se connecter</a></li>
            <li><a href="#SignIn">Sign in</a></li>
<li>
<audio controls = "controls" id = "player">
<source src = "../audio/birds.mp3" type = "audio/mpeg">
<source src = "../audio/birds.ogg" type = "audio/ogg">
Your browser does not support the HTML5 audio element.
</audio>
</li>
<li>
<div id = "searchbar">
<form action = "" class = "formulaire">
<input class = "champ" type = "text" value = "" placeholder = "Search"/>
<input class = "bouton" type = "button" value = " " />

</form>
</div>
</li>
</ul>
</div><!--/.navbar-collapse -->

</div><!--/.container -->

</nav>

<img id = "logo" class = "img-responsive" src = "../img/icon.png">
</div>






<div id = "content">

<div id = "info_artist">
</div>

<div id = "center">
</div>

<div id = "playlist">
</div>
</div>
</div>
</body>


<footer>
</footer>

<script src = "../js/bootstrap.js"></script>
<script src="../js/jsPrincipal.js"></script>
<script src="../js/hash.js"></script>
</html>
 ';
 }}