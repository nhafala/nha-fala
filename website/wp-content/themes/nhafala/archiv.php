<?php
/*
Template Name: Archiv_dyn
*/
?>

<?php get_header(); ?>

<style type="text/css">
body {
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/fondos/fondoazulprueba.jpg);
	background-repeat: repeat;
}
#orange_div {
	position:absolute;
	left:54px;
	top:88px;
	width:128px;
	height:101px;
	z-index:14;
}
#yellow_div {
	position:absolute;
	left:61px;
	top:0px;
	width:126px;
	height:106px;
	z-index:15;
}
#sky_div {
	position:absolute;
	left:54px;
	top:170px;
	width:126px;
	height:95px;
	z-index:16;
}
#green_div {
	position:absolute;
	left:54px;
	top:591px;
	width:126px;
	height:94px;
	z-index:17;
}
#white_div {
	position:absolute;
	left:56px;
	top:248px;
	width:126px;
	height:95px;
	z-index:18;
}
#pink_div {
	position:absolute;
	left:52px;
	top:336px;
	width:150px;
	height:62px;
	z-index:19;
}
#red_div {
	position:absolute;
	left:56px;
	top:414px;
	width:126px;
	height:109px;
	z-index:20;
}
#marin_div {
	position:absolute;
	left:56px;
	top:508px;
	width:126px;
	height:88px;
	z-index:21;
}
#archivbox{
	width:100%;
	height:auto;
	
}
#archivbox ul li{
	padding: 30px;
	display: inline-block;
	font-size: 20pt;
}
</style>
<script type="text/javascript">
function MM_effectGrowShrink(targetElement, duration, from, to, toggle, referHeight, growFromCenter)
{
	Spry.Effect.DoGrow(targetElement, {duration: duration, from: from, to: to, toggle: toggle, referHeight: referHeight, growCenter: growFromCenter});
}
</script>
<script>
$(document).ready(function(){
	$("#yellow_div").mouseenter(function(){
	MM_effectGrowShrink(yellow_image, 100, '130px', '165px', false, false, true);
	});
	$("#yellow_div").mouseleave(function(){
	MM_effectGrowShrink(yellow_image, 100, '165px', '130px', false, false, true)
	});
	
	$("#orange_div").mouseenter(function(){
	MM_effectGrowShrink(orange_image, 100, '141px', '181px', false, false, true)
	});
	$("#orange_div").mouseleave(function(){
	MM_effectGrowShrink(orange_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#sky_div").mouseenter(function(){
	MM_effectGrowShrink(sky_image, 100, '141px', '181px', false, false, true)
	});
	$("#sky_div").mouseleave(function(){
	MM_effectGrowShrink(sky_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#green_div").mouseenter(function(){
	MM_effectGrowShrink(green_image, 100, '141px', '181px', false, false, true)
	});
	$("#green_div").mouseleave(function(){
	MM_effectGrowShrink(green_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#white_div").mouseenter(function(){
	MM_effectGrowShrink(white_image, 100, '141px', '181px', false, false, true)
	});
	$("#white_div").mouseleave(function(){
	MM_effectGrowShrink(white_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#pink_div").mouseenter(function(){
	MM_effectGrowShrink(pink_image, 100, '141px', '181px', false, false, true)
	});
	$("#pink_div").mouseleave(function(){
	MM_effectGrowShrink(pink_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#red_div").mouseenter(function(){
	MM_effectGrowShrink(red_image, 100, '141px', '181px', false, false, true)
	});
	$("#red_div").mouseleave(function(){
	MM_effectGrowShrink(red_image, 100, '181px', '141px', false, false, true)
	});
	
	$("#marin_div").mouseenter(function(){
	MM_effectGrowShrink(marin_image, 100, '141px', '181px', false, false, true)
	});
	$("#marin_div").mouseleave(function(){
	MM_effectGrowShrink(marin_image, 100, '181px', '141px', false, false, true)
	});
});
</script>
</head>
<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
  
  <div class="content_full shadow">
  <div id="archivbox">
  <ul>
 <?php
  $curYear = date('Y');
    for ($year = 2005; $year <= $curYear; $year++) {
    echo '<li><a href="http://nha-fala.ch/?page_id=628&jahr='.($year).'">'.($year).'</a></li>';
  }
  ?>
  </ul>
  <div class="bottom_line"><p> </p></div>
  </div>
 
  <?php
$jahr = $_GET[jahr];
if(is_null($jahr)):
$jahr=$curYear;
endif;
$args=array(
'posts_per_page' => '-1',
'year' => $jahr,
'category__not_in' => get_cat_ID('archiv_now_show'),
'post_status' => 'publish');

$arch = new WP_Query($args);

while($arch->have_posts()) :
$arch->the_post();?>
<p class="datum">Datum des Beitrags: <?php the_time('j. F, Y'); ?></p>
<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

<div class="archiv_excerpt">
<p class="readit"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aktuell-gelb-thumb'); ?></a><?php the_excerpt(); ?></p></div>
<div class="bottom_line"><p> </p></div>
<?php endwhile;
// Reset Post Data
wp_reset_postdata();?>
  </div>
  
</div>
</div>
</body>

<?php get_footer(); ?>