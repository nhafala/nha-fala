<?php
    $args = array('type'=> 'post', 'order' => 'ASC', 'hide_empty' => 1 );
    $taxonomies = array('event-category');
    $terms = get_terms( $taxonomies, $args);
?>

<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

  <div class="rw">
    <div class="c-x-12 c-s-6">
      <h3 class='upcoming-events-title'>Zukünftige Ereignisse:</h3>
    </div>
<!--      --><?php //if( is_user_logged_in() ){ ?>
    <div class="c-x-12 c-s-6">
      <select id="sf-future-events-select"><option value="">Alle Terminkategorien</option>
          <?php if (is_user_logged_in()) { ?>
          <option value="probe-trotinnet">Probe trotinnet</option>
          <option value="probe-hurllibus">Probe hurllibus</option>
          <option value="probe-il-pedone">Probe il pedone</option>
          <option value="probe-rock-the-feet">Probe rock the feet</option>
              <?php foreach($terms as $term) : ?>
                  <option value="<?php print $term->slug; ?>"><?php print $term->name; ?></option>
              <?php endforeach; ?>
          <?php }else{ ?>
          <?php foreach($terms as $term) : ?>
              <option value="<?php print $term->slug; ?>"><?php print $term->name; ?></option>
          <?php endforeach; ?>
          <?php } ?>
      </select>
    </div>
<!--      --><?php //}else{ echo '';};?>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div id="sf-future-events-content">
        <?php
        $event_template = nhafala_get_event_template();
        echo do_shortcode("[eo_events numberposts=5 order=ASC showpastevents=false]{$event_template}[/eo_events]");
        ?>
      </div>
    </div>
  </div>
<?php //if( is_user_logged_in() ){ ?>
  <div class="sf-event-legend">
      <?php if (is_user_logged_in()) { ?>
      <div class="sf-event-legend-cell">Probe trotinnet <span style="background-color:#5fd11f;"></span></div>
      <div class="sf-event-legend-cell">Probe hurllibus <span style="background-color:#f73636;"></span></div>
      <div class="sf-event-legend-cell">Probe il pedone <span style="background-color:#44fded;"></span></div>
      <div class="sf-event-legend-cell">Probe rock the feet <span style="background-color:#fdf144;"></span></div>
      <?php
          foreach ($terms as $term) {
              echo '<div class="sf-event-legend-cell">' . $term->name . ' <span style="background-color:' . $term->color . ';"></span></div>';
          }
      ?>
      <?php }else{ ?>
        <?php
            foreach ($terms as $term) {
                echo '<div class="sf-event-legend-cell">' . $term->name . ' <span style="background-color:' . $term->color . ';"></span></div>';
            }
        ?>
      <?php } ?>
  </div>
<?php //}else{ echo '';};?>
    <?php
      echo do_shortcode('[eo_fullcalendar headerLeft="prev,next today" headerCenter="title" headerRight="category" timeformat="j. F G:i" ]');
  ?>

  <?php
    echo do_shortcode('[eo_subscribe title="Kalender Abonnieren" type="webcal" class="sf-calendar-subscribe"] Events abonnieren [/eo_subscribe]');
  ?>
	
	<?php the_content(); ?>

</article><!-- #post-## -->
</div>
<script>
    var i;
    var length = document.querySelectorAll('.future-event-link').length;
    //console.log(length);
    for (i = 0; i < length; i++) {
        var text = document.getElementsByClassName('future-event-link')[i].textContent;
        text = text.replace('Privat: ', '');
        document.getElementsByClassName('future-event-link')[i].innerHTML = text;
        //console.log(text);
    }
    // var i;
    <?php if(is_user_logged_in()){?>
       setTimeout(function(){
           var length =document.querySelectorAll('.fc-right').length;
           console.log(length);
                $('.eo-fc-filter').append('<option value="auftritt">Auftritt</option>');
                $('.eo-fc-filter').append('<option value="gottesdienst">Gottesdienst</option>');
                $('.eo-fc-filter').append('<option value="lager">Lager</option>');
       }, 2000);
    <?php } ?>
</script>

