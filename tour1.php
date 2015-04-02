<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Complimentary Tours</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/demostyles.css">
        <link rel="stylesheet" href="css/simple-slideshow-styles.css">

        <style>
          .slide_img{
            height: 100%;
            width: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
          }
        </style>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
            <h1 id="address"></h1>
            <p><a class="website"><span class="desc" id="realtor"></span></a></p>
        </header>    
        <div class="bss-slides num1" tabindex="1" autofocus="autofocus" id="num1">
          <?php 
            $pid=$_GET['pid'];
            include("get_photos1.php");
          ?>
        </div> <!-- // bss-slides -->  
<div class="content">
<h2>What is it?</h2>

<p>It's a fairly basic slideshow, written in javascript. This is a dual-purpose project, it's meant to be something you can drop right into your page and use if you so choose, but it's also meant as an example/tutorial script showing how to build a simple DIY slideshow from scratch on your own. <a href="http://themarklee.com/2014/10/05/better-simple-slideshow/">Here is a tutorial/walkthrough</a>.</p>
        
<h2>Features</h2>
<ul>
    <li>fully responsive</li>
    <li>option for auto-advancing slides, or manually advancing by user</li>
    <li>multiple slideshows per-page</li>
    <li>supports arrow-key navigation</li>
    <li>full-screen toggle using HTML5 fullscreen api</li>
    <li>swipe events supported on touch devices (requires <a href="https://github.com/hammerjs/hammer.js">hammer.js</a>)</li>
    <li>written in vanilla JS--this means no jQuery dependency (much &hearts; for <a href="https://github.com/jquery/jquery">jQuery</a> though!)</li>
</ul>
        
<h2>Getting Started</h2>
<ol>
<li><p>HTML markup for the slideshow should look basically like this, with a container element wrapping the whole thing (doesn't have to be a <span class="code">&lt;div&gt;</span>) and each slide is a <span class="code">&lt;figure&gt;</span>.</p>

<script src="https://gist.github.com/leemark/83571d9f8f0e3ad853a8.js"></script> </li>   

<li>Include the script: <span class="code">js/better-simple-slideshow.min.js</span> or <span class="code">js/better-simple-slideshow.js</span></li>
<li>Include the stylesheet <span class="code">css/simple-slideshow-styles.css</span></li>
<li>Initialize the slideshow:
<script src="https://gist.github.com/leemark/479d4ecc4df38fba500c.js"></script>
</li>
</ol>
</div> <!-- // content -->   
<footer>Complimentary Tours by Kris Occhipinti <a href="https://www.gnu.org/licenses/agpl-3.0.html" target="_blank">License</a>. 
<br>
Slide Show Based On Work By <a href="http://themarklee.com">Mark Lee</a>
<br><span>&#9774; + &hearts;</span></footer>        
<script src="js/hammer.min.js"></script><!-- for swipe support on touch interfaces -->
<script src="js/better-simple-slideshow.min.js"></script>
<script src="js/jquery.js"></script>
<script>
var opts = {
    auto : {
        speed : 3000, 
        pauseOnHover : false
    },
    fullScreen : false, 
    swipe : true
};
makeBSS('.num1', opts);


  $(document).ready(function(){
    if(getUrlParameter('pid')){
      var pid = getUrlParameter("pid");
      $("#pid").val(getUrlParameter("pid"));
      $.get('get_photos.php?pid='+pid, function(data){
        var imgs = data.split(",");
        for(var i=0;i<imgs.length;i++){
          if(imgs[i] != ""){
            var img=imgs[i].split("/")[2].split(".")[0];
            $("#num1").append($("<figure>")
              .attr("id", img+"_fig")
            );
            $("#"+img+"_fig").append($("<img>")
              .attr("src", imgs[i])
              .attr("id", img)
            );  
            $("#"+img).append('<figcaption>');

          }
        }
      });
    }else{
      window.location = "index.php";
    }


    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    }  
  }); 
</script>
</body>
</html>
