<?php
/*
Template Name: Aktuell
*/
?>

<?php get_header(); ?>

<style type="text/css">
body {
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/fondos/fondoazulprueba.jpg);
	background-repeat: repeat;
}
#yellow_div {
	left:166px;
	top:215px;
	width:239px;
	height:268px;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroamarillofrente.png);
	background-repeat: no-repeat;
	z-index:3;

}
#yellow_div_inside {
	width:230px;
	height:250px;
	z-index:4;
	margin: -120px 0 0 -115px;
	margin-top: -95px;
/*	position:relative;
	top:50%;
	margin-top:-120px;*/
}

#red_div {
	left:419px;
	top:248px;
	width:352px;
	height:261px;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorojofrente.png);
	background-repeat: no-repeat;
	z-index:4;
	text-align:center
}
#red_div_inside {
	width:352px;
	height:220px;
	z-index:5;
	margin: -95px 0 0 -176px;
}
#logo_div {
	position:absolute;
	left:652px;
	top:240px;
	width:436px;
	height:352px;
	z-index:1;
}
#white_div {
	left:165px;
	top:11px;
	width:282px;
	height:216px;
	z-index:100;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroblancofrente2.png);
	background-repeat: no-repeat;
}
#white_div_inside {
	width:282px;
	height:150px;
	z-index:101;
	margin-top: -95px;
	margin-right: 0;
	margin-bottom: 0;
	margin-left: -141px;
	padding-top: 30px;
}
#white_div_inside ul {
	font-size:14px !important;
}

#white_div #white_image {
	position: relative;
	top: -216px;
}
#green_div {
	left:454px;
	top:14px;
	width:307px;
	height:242px;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroverdefrente.png);
	background-repeat: no-repeat;
	z-index:7;
}
#green_div_inside {
	width:307px;
	height:242px;
	z-index:8;
	margin-top: -121px;
	margin-right: 0;
	margin-bottom: 0;
	margin-left: -158px;
	padding-top: 5px;
}

#orange_div {
	left:175px;
	top:485px;
	width:252px;
	height:230px;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadronaranjafrente.png);
	background-repeat: no-repeat;
	z-index:8;
}
#orange_div_inside {
	width:252px;
	height:231px;
	margin: -90px 0 0 -130px;
	z-index:9;
}
	
#pink_div {
	left:775px;
	top:37px;
	width:223px;
	height:201px;
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorosafrente.png);
	background-repeat: no-repeat;
	z-index:9;
}
#pink_div_inside {
	width:226px;
	height:170px;
	margin: -65px 0 0 -113px;
	z-index:10;
}
#noah_div {
	z-index:12;
	width:445px;
	height:142px;
	left: 453px;
	top: 550px;
	box-shadow: 10px 10px 3px #000;	
}
</style>

<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_effectHighlight(targetElement, duration, startColor, endColor, restoreColor, toggle)
{
	Spry.Effect.DoHighlight(targetElement, {duration: duration, from: startColor, to: endColor, restoreColor: restoreColor, toggle: toggle});
}
function MM_effectGrowShrink(targetElement, duration, from, to, toggle, referHeight, growFromCenter)
{
	Spry.Effect.DoGrow(targetElement, {duration: duration, from: from, to: to, toggle: toggle, referHeight: referHeight, growCenter: growFromCenter});
}
function MM_effectShake(targetElement)
{
	Spry.Effect.DoShake(targetElement);
}
function MM_changeProp(objId,x,theProp,theValue) { //v9.0
  var obj = null; with (document){ if (getElementById)
  obj = getElementById(objId); }
  if (obj){
    if (theValue == true || theValue == false)
      eval("obj.style."+theProp+"="+theValue);
    else eval("obj.style."+theProp+"='"+theValue+"'");
  }
}
</script>

<script>
$(document).ready(function(){
	$("#yellow_div").mouseenter(function(){
	MM_effectGrowShrink('yellow_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('yellow_div_inside','','visibility','visible','DIV');
	$("#yellow_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroamarillofrente2.png)"); 
	});
	$("#yellow_div").mouseleave(function(){
	MM_effectGrowShrink('yellow_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('yellow_div_inside','','visibility','hidden','DIV');
	$("#yellow_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroamarillofrente.png)");
	});
	$("#red_div").mouseenter(function(){
	MM_effectGrowShrink('red_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('red_div_inside','','visibility','visible','DIV');
	$("#red_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorojofrente2.png)");
	});
	$("#red_div").mouseleave(function(){
	MM_effectGrowShrink('red_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('red_div_inside','','visibility','hidden','DIV');
	$("#red_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorojofrente.png)");
	});
	$("#green_div").mouseenter(function(){
	MM_effectGrowShrink('green_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('green_div_inside','','visibility','visible','DIV');
	$("#green_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroverdefrente2.png)");
	});
	$("#green_div").mouseleave(function(){
	MM_effectGrowShrink('green_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('green_div_inside','','visibility','hidden','DIV');
	$("#green_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroverdefrente.png)");
	});
	$("#orange_div").mouseenter(function(){
	MM_effectGrowShrink('orange_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('orange_div_inside','','visibility','visible','DIV');
	});
	$("#orange_div").mouseleave(function(){
	MM_effectGrowShrink('orange_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('orange_div_inside','','visibility','hidden','DIV');
	});
	$("#pink_div").mouseenter(function(){
	MM_effectGrowShrink('pink_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('pink_div_inside','','visibility','visible','DIV');
	$("#pink_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorosafrente2.png)");
	});
	$("#pink_div").mouseleave(function(){
	MM_effectGrowShrink('pink_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('pink_div_inside','','visibility','hidden','DIV');
	$("#pink_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorosafrente.png)");
	});
	$("#white_div").mouseenter(function(){
	MM_effectGrowShrink('white_div', 150, '100%', '110%', false, false, true);
	MM_changeProp('white_div_inside','','visibility','visible','DIV');
	$("#white_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroblancofrente.png)");
	});
	$("#white_div").mouseleave(function(){
	MM_effectGrowShrink('white_div', 150, '100%', '91%', false, false, true);
	MM_changeProp('white_div_inside','','visibility','hidden','DIV');
	$("#white_div").css("background-image", "url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroblancofrente2.png)");
	});	
});
</script>


<body onLoad="MM_preloadImages('<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/whenclick/cuadronaranjafrente1.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/whenclick/cuadrorosafrente1.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/whenclick/cuadroazulfrente1.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/whenclick/cuadroamarillofrente1.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/whenclick/cuadrorojofrente1.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroamarillofrente2.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroblancofrente2.png',url(<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorosafrente2.png',<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadroverdefrente2.png','<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/cuadrorojofrente2.png')">
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">

   <div id="noah_div" class="box">
     <?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=konzert_titel&showposts=1');
while($titelseite->have_posts()) :
$titelseite->the_post();?>
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('konzert-titel-thumb'); ?></a>
<?php endwhile; ?>
   </div>
   
  <div id="yellow_div" class="box">
  <div id="yellow_div_inside" class="inside">
  <div class="center_vertically">
  <div class="lW" style="width:8px;"></div><div class="rW" style="width:18px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:12px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:4px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:7px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:10px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:14px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:17px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:21px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:25px;"></div><div class="rW" style="width:11px;"></div><div class="lW" style="width:29px;"></div><div class="rW" style="width:13px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div> <?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=aktuell_gelb&showposts=1');
 
while($titelseite->have_posts()) :
$titelseite->the_post();?>
 
<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-gelb-thumb'); ?></a></p>
<p class="readit"><a href="<?php the_permalink() ?>">mehr</a>»</p>
 
<?php endwhile; ?>
</div>
</div>
</div>
  
<div id="red_div" class="box">
<div id="red_div_inside" class="inside">
<div class="lW" style="width:0px;"></div><div class="rW" style="width:21px;"></div><div class="lW" style="width:8px;"></div><div class="rW" style="width:18px;"></div><div class="lW" style="width:7px;"></div><div class="rW" style="width:15px;"></div><div class="lW" style="width:6px;"></div><div class="rW" style="width:12px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:4px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:4px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:6px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:15px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:6px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:9px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:10px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:10px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:50px;"></div><div class="rW" style="width:0px;"></div>
  <?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=aktuell_rot&showposts=1');
 
while($titelseite->have_posts()) :
$titelseite->the_post();?>
 
<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-rot-thumb'); ?></a></p>
<p class="readit"><a href="<?php the_permalink() ?>">mehr</a>»</p>
 
<?php endwhile; ?>
</div>
</div>

<div id="green_div" class="box">
<div id="green_div_inside" class="inside">
<div class="lW" style="width:17px;"></div><div class="rW" style="width:11px;"></div><div class="lW" style="width:13px;"></div><div class="rW" style="width:7px;"></div><div class="lW" style="width:8px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:3px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:4px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:7px;"></div><div class="rW" style="width:5px;"></div><div class="lW" style="width:10px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:13px;"></div><div class="rW" style="width:8px;"></div><div class="lW" style="width:17px;"></div><div class="rW" style="width:12px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div>
 <?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=aktuell_gruen&showposts=1');
 
while($titelseite->have_posts()) :
$titelseite->the_post();?>
 
<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-gruen-thumb'); ?></a></p>
<p class="readit"><a href="<?php the_permalink() ?>">mehr</a>»</p>
 
<?php endwhile; ?>
</div>
</div>

<div id="orange_div" class="box">
<div id="orange_div_inside" class="inside">
<div class="lW" style="width:10px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:8px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:6px;"></div><div class="rW" style="width:7px;"></div><div class="lW" style="width:4px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:11px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:12px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:14px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:15px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:15px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:14px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:14px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:12px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:11px;"></div><div class="lW" style="width:3px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:7px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:11px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div>
  <?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=aktuell_orange&showposts=1');
 
while($titelseite->have_posts()) :
$titelseite->the_post();?>
 
<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-orange-thumb'); ?></a></p>
<p class="readit"><a href="<?php the_permalink() ?>">mehr</a>»</p>
 
<?php endwhile; ?>
</div>
</div>

<div id="pink_div" class="box">
<div id="pink_div_inside" class="inside">
<div class="lW" style="width:9px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:6px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:3px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:3px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:9px;"></div><div class="rW" style="width:5px;"></div><div class="lW" style="width:12px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:15px;"></div><div class="rW" style="width:14px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div>
<?php 
$titelseite = new WP_Query();
$titelseite->query('category_name=aktuell_pink&showposts=1');
 
while($titelseite->have_posts()) :
$titelseite->the_post();?>
 
<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-pink-thumb'); ?></a></p>
<p class="readit"><a href="<?php the_permalink() ?>">mehr</a>»</p>
 
<?php endwhile; ?>
</div>
</div>


<div id="white_div" class="box">
<div id="white_div_inside" class="inside">
<a href="http://nha-fala.ch/kalender"><span class="calendar-link"></span></a>
<div class="lW" style="width:0px;"></div><div class="rW" style="width:1px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:3px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:4px;"></div><div class="lW" style="width:1px;"></div><div class="rW" style="width:5px;"></div><div class="lW" style="width:2px;"></div><div class="rW" style="width:7px;"></div><div class="lW" style="width:3px;"></div><div class="rW" style="width:8px;"></div><div class="lW" style="width:5px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:7px;"></div><div class="rW" style="width:9px;"></div><div class="lW" style="width:10px;"></div><div class="rW" style="width:8px;"></div><div class="lW" style="width:13px;"></div><div class="rW" style="width:8px;"></div><div class="lW" style="width:17px;"></div><div class="rW" style="width:6px;"></div><div class="lW" style="width:22px;"></div><div class="rW" style="width:5px;"></div><div class="lW" style="width:27px;"></div><div class="rW" style="width:2px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div><div class="lW" style="width:0px;"></div><div class="rW" style="width:0px;"></div>
<?php /* Widgetized sidebar */
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('calendar') ) : ?><?php endif; ?>
</div>
</div>


<div id="logo_div"> <a href="http://nha-fala.ch/portrait/"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Homepage/logofrente.png" name="logo_image" width="435" height="349" id="logo_image" onMouseOver="MM_effectShake(this)" /></a></div>


</div>
</div>
</body>

<?php get_footer(); ?>