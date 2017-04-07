<?php

define('ARRAY_VIEWER_MAX_DEPTH', 10);

/**
 * Print arrays as collapsible items.
 * Can be used as an alternative to print_r.
 */
function print_c($data, $level = 0) {
  if ($level > ARRAY_VIEWER_MAX_DEPTH) {
    print "[...]";
    return false;
  }

  $padlevel = ($level > 4) ? 4 : $level;
  $pad = str_pad('', $padlevel * 4, ' ');
  $innerpad = str_pad('', ($padlevel + 1) * 4, ' ');

  $data = (array) $data;
  foreach ($data as $key => $value) {
    print "\n$pad<div class='array_container'>\n$innerpad<div class='array_key'>$key</div>";
    print "\n$innerpad<div class='array_value'>";
    if (is_array($value)) {
      $level++;
      $level++;
      print_c($value, $level);
    }
    else {
      print $value;
    }
    print "\n$innerpad</div> <!-- /.array_value of $key -->";
    print "\n$pad</div>";
  }
}

