<?php
/*
Template Name: Portrait
*/
?>

<?php get_header(); ?>

<style type="text/css">
body {
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/fondos/fondoazulprueba.jpg);
	background-repeat: repeat;
}

#name {
	position:absolute;
	left:0px;
	top:4px;
	width:166px;
	z-index:14;
}
#chorleitung {
	position:absolute;
	left:0px;
	top:418px;
	width:224px;
	z-index:15;
}
#nha_fala {
	position:absolute;
	left:-19px;
	top:172px;
	width:236px;
	z-index:16;
}
#kinder {
	position:absolute;
	left:0px;
	top:308px;
	width:207px;
	z-index:17;
}
#freiwillige {
	position:absolute;
	left:0px;
	top:570px;
	width:156px;
	z-index:13;
}
</style>
</head>
<script type="text/javascript">
function MM_effectGrowShrink(targetElement, duration, from, to, toggle, referHeight, growFromCenter)
{
	Spry.Effect.DoGrow(targetElement, {duration: duration, from: from, to: to, toggle: toggle, referHeight: referHeight, growCenter: growFromCenter});
}
</script>
<script>
$(document).ready(function(){
	$("#name").mouseenter(function(){
	MM_effectGrowShrink(name_image, 150, '100%', '120%', false, false, true);
	});
	$("#name").mouseleave(function(){
	MM_effectGrowShrink(name_image, 150, '100%', '91%', false, false, true);
	});
	$("#chorleitung").mouseenter(function(){
	MM_effectGrowShrink('chorleitung_image', 150, '100%', '120%', false, false, true);
	});
	$("#chorleitung").mouseleave(function(){
	MM_effectGrowShrink('chorleitung_image', 150, '100%', '91%', false, false, true);
	});
	$("#nha_fala").mouseenter(function(){
	MM_effectGrowShrink('nha_fala_image', 150, '100%', '120%', false, false, true);
	});
	$("#nha_fala").mouseleave(function(){
	MM_effectGrowShrink('nha_fala_image', 150, '100%', '91%', false, false, true);
	});
	$("#kinder").mouseenter(function(){
	MM_effectGrowShrink('kinder_image', 150, '100%', '120%', false, false, true);
	});
	$("#kinder").mouseleave(function(){
	MM_effectGrowShrink('kinder_image', 150, '100%', '91%', false, false, true);
	});
	$("#freiwillige").mouseenter(function(){
	MM_effectGrowShrink('freiwillige_image', 150, '100%', '120%', false, false, true);
	});
	$("#freiwillige").mouseleave(function(){
	MM_effectGrowShrink('freiwillige_image', 150, '100%', '91%', false, false, true);
	});
});
</script>

<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">


<div class="content shadow">

<a href="https://twitter.com/share" class="twitter-share-button" data-via="NhaFala" data-lang="de">Twittern</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->


<?php endwhile; // end of the loop. ?></div>


<div id="name"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Portrait/cuadroamarillo.png" name="name_image" width="163" height="180" id="name_image"/><div class="portrait_menu portrait_item"><a href="#name_anker">Der Name</a></div></div>

<div id="chorleitung"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Portrait/cuadronaranja.png" width="204" height="162" id="chorleitung_image"/><div class="portrait_menu portrait_item"><a href="#chorleitung_anker">Chorleitung</a></div></div>
<div id="nha_fala"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Portrait/cuadrorojo.png" width="253" height="137" id="nha_fala_image"/><div class="portrait_menu portrait_item"><a href="#jugendchor_anker">Der Jugendchor Nha Fala</a></div></div>
<div id="kinder"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Portrait/Cuadroazul.png" width="200" height="110" id="kinder_image"/><div class="portrait_menu portrait_item"><a href="#kinder_anker">Kinder</a></div></div>
<div id="freiwillige"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/Portrait/cuadrorosa.png" width="200" height="135" id="freiwillige_image"/><div class="portrait_menu portrait_item"><a href="#freiwillige_anker">Freiwillige</a></div></div>

</div>
</div>
</body>

<?php get_footer(); ?>