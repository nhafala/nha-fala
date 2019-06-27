<?php

function nhafala_get_event_template()
{
    return '
<div class="future-event-item" data-duration="%event_duration{%d}%">
    <div class="future-event-datetime">
        <span class="future-event-start">%start{j. F}{H:i}%</span> &mdash; 
        <span class="future-event-end"><span class="end-date">%end{j. F}{}%</span>%end{}{H:i}%</span>
        <div class="future-event-duration">%event_duration{%d}% tage</div>
    </div>
    <div class="future-event-details">
        <a class="future-event-link" href="%event_url%">%event_title%</a>
        <div class="future-event-venue"><p>%event_venue%</p></div>
    </div>
</div>
';
}

add_action('wp_ajax_nhafala_future_events_select', 'nhafala_future_events_select');
add_action('wp_ajax_nopriv_nhafala_future_events_select', 'nhafala_future_events_select');

function nhafala_future_events_select() {
	$select='';
	if ($_POST['select']!='') {
        $event_category = (string) stripslashes($_POST['select']);
		$select = " event_category='{$event_category}'";
    }
	$event_template = nhafala_get_event_template();
    $shortcode = "
        [eo_events numberposts=5 order=ASC showpastevents=false {$select}]
        {$event_template}
        [/eo_events]
    ";
	echo do_shortcode($shortcode);
	wp_die();
}

//add_filter( 'eventorganiser_event_tooltip', 'nhafala_event_tooltip', 10, 3 );

function nhafala_event_tooltip( $description, $event_id, $occurrence_id, $post ){

    $html = "";
    $duration = 0;

    if ($duration > 0) {
        
    }

    $start = 'Anfang: ' . eo_get_the_start( 'j. F H:i', $event_id, $occurrence_id);
    $end = 'Ende: ' . eo_get_the_end('j. F H:i', $event_id, $occurrence_id);
    $venue = 'Tagungsort: ' . eo_get_venue_name( eo_get_venue( $event_id ) );
    $description = $start . '<br>' . $end . '<br>' . $venue ;
    return $description;
}
