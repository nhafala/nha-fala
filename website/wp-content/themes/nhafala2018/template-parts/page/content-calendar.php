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
    <div class="c-x-12 c-s-6">
      <select id="sf-future-events-select"><option value="">Alle Terminkategorien</option>
              <?php foreach($terms as $term) : ?>
                  <option value="<?php print $term->slug; ?>"><?php print $term->name; ?></option>
              <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div id="sf-future-events-content">
        <?php
        $event_template = nhafala_get_event_template();
        echo do_shortcode("[eo_events event_category=auftritt numberposts=5 order=ASC showpastevents=false]{$event_template}[/eo_events]");
        ?>
      </div>
    </div>
  </div>

  <div class="sf-event-legend">
      <?php
          foreach ($terms as $term) {
              echo '<div class="sf-event-legend-cell">' . $term->name . ' <span style="background-color:' . $term->color . ';"></span></div>';
          }
      ?>
  </div>
    <?php
      echo do_shortcode('[eo_fullcalendar event_category="hurrlibus,trottinett,rockets,geradewaegs,auftritt" headerLeft="prev,next today" headerCenter="title" headerRight="category" timeformat="j. F G:i" ]');
    ?>
	
	<?php the_content(); ?>

    <div id="kalendar-abonnieren">
        <div>
            <h3>Kalendar mit Outlook, iCal oder Google abonnieren:</h3>
        </div>
        <ul>
            <?php
            // echo "<li>";
            //    echo do_shortcode('[eo_subscribe title="Kalender Abonnieren" type="webcal" class="sf-calendar-subscribe"] Events abonnieren [/eo_subscribe]');
            // echo "</li>";
            echo "<li>";
            echo do_shortcode('[eo_subscribe title="Kalender «Auftritte» abonnieren" type="webcal" class="sf-calendar-subscribe" category="auftritt"] Kalender «Auftritte» abonnieren [/eo_subscribe]');
            echo "</li>";
            echo "<li>";
            echo do_shortcode('[eo_subscribe title="Kalender «hurrlibus» abonnieren (Proben, Auftritte, Lager)" type="webcal" class="sf-calendar-subscribe" category="hurrlibus"]  Kalender «hurrlibus» abonnieren (Proben, Auftritte, Lager) [/eo_subscribe]');
            echo "</li>";
            echo "<li>";
            echo do_shortcode('[eo_subscribe title="Kalender «trottinett» abonnieren (Proben, Auftritte, Lager)" type="webcal" class="sf-calendar-subscribe" category="trottinett"] Kalender «trottinett» abonnieren (Proben, Auftritte, Lager) [/eo_subscribe]');
            echo "</li>";
            echo "<li>";
            echo do_shortcode('[eo_subscribe title="Kalender «rockets» abonnieren (Proben, Auftritte, Lager)" type="webcal" class="sf-calendar-subscribe" category="rockets"] Kalender «rockets» abonnieren (Proben, Auftritte, Lager) [/eo_subscribe]');
            echo "</li>";
            echo "<li>";
            echo do_shortcode('[eo_subscribe title="Kalender «gradewägs» abonnieren (Proben, Auftritte, Lager)" type="webcal" class="sf-calendar-subscribe" category="geradewaegs"] Kalender «gradewägs» abonnieren (Proben, Auftritte, Lager) [/eo_subscribe]');
            echo "</li>";
            ?>
        </ul>
    </div>

</article><!-- #post-## -->
</div>
<script>
    var i;
    var length = document.querySelectorAll('.future-event-link').length;
    for (i = 0; i < length; i++) {
        var text = document.getElementsByClassName('future-event-link')[i].textContent;
        text = text.replace('Privat: ', '');
        document.getElementsByClassName('future-event-link')[i].innerHTML = text;
    }
    setTimeout(function(){
        var event = document.getElementById("sf-future-events-select");
        event.children[1].setAttribute("selected", "selected");
    }, 10);
    setTimeout(function(){
        var event = document.getElementsByClassName("eo-fc-filter");
        var option = event[0].options;
        option[1].setAttribute("selected", "selected");
    }, 100);
</script>

