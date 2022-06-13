<?php
  /*
    Using the query from #1, write a WordPress template loop to output Events in the following layout and fields:
      - Three column row using Bootstrap 4 (single column responsive on small)
      - Featured image
      - Title
      - Excerpt
      - Permalink
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

   if($webinar_posts->have_posts()) : ?>
<div class="row">
  <?php
      while($webinar_posts->have_posts()) :
        $webinar_posts->the_post();
    ?>
  <div class="col-lg-4 col-sm-12">
    <?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid', 'alt' => get_the_title(), ) ); ?>
    <h3><?php the_title() ?></h3>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink() ?>">View Event</a>
  </div>
  <?php
      endwhile;
    ?>
</div>
<?php
    endif;
  ?>