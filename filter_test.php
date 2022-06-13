<?php
/*
  There's a WordPress plugin with the following:

  function init()
  {
    $title = 'hello world lorem ipsum';

    return apply_filters( 'update_title', $title, 10, 3 );
  }

  Write a filter to return 'hello world';
*/

function filterTitle($value) {
  $result = preg_replace('/lorem ipsum/', '', $value);

  if (strlen($result) > 0) {
    return $result;
  }
}

add_filter('update_title', 'filterTitle');

?>