<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php $show_date_array = array(
    'post',
    'projects'
  );
  ?>

	<header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php if (in_array(get_post_type(), $show_date_array)) : ?>
    <span class="entry-meta">
      <?php print nhafala_time_link() ?>
    </span>
    <?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ('' !== get_the_post_thumbnail()) : ?>
		<div class="entry-thumbnail">
				<?php the_post_thumbnail('nhafala-post-banner'); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

    <?php the_content(); ?>

    <?php
    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . __('Pages:', 'nhafala'),
        'after' => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after' => '</span>',
      )
    );
    ?>

    <p class="kategorien"><strong>Kategorien: </strong></p>

        <!-- Display map -->
<!--    <div class="eo-event-venue-map">-->
<!--        --><?php //echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
<!--    </div>-->

    <?php nhafala_social_likes() ?>

  </div><!-- .entry-content -->

</article><!-- #post-## -->

<script>
   var event = document.getElementsByTagName('article');
   var splitniz = event[0].getAttribute("class").split(" ");
   var counta = splitniz.length;
   var niz = [];
   for (k = 0; k < counta; k++) {
       if (splitniz[k] === 'event-category-hurrlibus') {
           niz[niz.length] = 'hurrlibus';
       }
       if (splitniz[k] === 'event-category-trottinett') {
           niz[niz.length] = 'trottinett';
       }
       if (splitniz[k] === 'event-category-geradewaegs') {
           niz[niz.length] = 'geradewaegs';
       }
       if (splitniz[k] === 'event-category-rockets') {
           niz[niz.length] = 'rockets';
       }
       if (splitniz[k] === 'event-category-auftritt') {
           niz[niz.length] = 'auftritt';
       }
   }
   var counter = niz.length;
   var i;
   var kategorien = document.getElementsByClassName("kategorien");
   if(counter !== 0) {
       for (i = 0; i < counter; i++) {
           if (i === counter - 1) {
               kategorien[0].innerHTML += niz[i];
           } else {
               kategorien[0].innerHTML += niz[i] + ", ";
           }
       }
   }else{
        kategorien[0].innerHTML += "/";
   }
</script>
