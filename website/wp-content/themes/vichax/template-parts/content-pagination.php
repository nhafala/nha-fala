<?php
/**
 * Template part for posts pagination.
 *
 * @package Vichax
 */

the_posts_pagination( apply_filters( 'vichax_content_posts_pagination',
	array(
		'prev_text' => ( ! is_rtl() ) ? '<i class="linearicon linearicon-arrow-left"></i>' : '<i class="linearicon linearicon-arrow-right"></i>',
		'next_text' => ( ! is_rtl() ) ? '<i class="linearicon linearicon-arrow-right"></i>' : '<i class="linearicon linearicon-arrow-left"></i>',
	)
) );
