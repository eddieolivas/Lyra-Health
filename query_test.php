<?php
  /*
    With the following schema:
      - Post type: event
      - Taxonomy: event_type
      - Custom field: start_date

    Write a WP_Query() with args to get all events that are categorized as event_type: webinar, and start_date after 01/02/2020
  */
   $args = array(
    'post_type' => 'event',
    'tax_query' => array(
        array(
          'taxonomy' => 'event_type',
          'field' => 'slug',
          'terms' => 'webinar'
        ),
      ),
    'meta_query' => array(
        array(
          'key' => 'start_date',
          'value' => date('Y-m-d', strtotime('2020-01-02')),
          'compare' => '>',
        )
      )
    );
   $webinar_posts = new WP_Query($args);
?>