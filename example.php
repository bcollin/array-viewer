<html class="html">
  <head>
    <title>Array Viewer</title>
    <link type="text/css" rel="Stylesheet" href="array-viewer.css">
    <style type="text/css" rel="Stylesheet">
    <!--
      div, p, h1, h2, h3 {
        max-width: 36em;
      }
    -->
    </style>
  </head>
<body>

<h1>Array Viewer</h1>

<h2>Introduction</h2>

<p>Sometimes during debugging PHP code you have to look at large arrays of arrays of arrays containing who knows what. PHP's print_r() and var_dump() functions are invaluable for this, but for really large and complex arrays their output quickly becomes hard to read.</p>

<p>Array Viewer replaces these two commands by turnning arrays into collapsible HTML lists of array keys and values. It comes in three parts, a printer function print_c in an include file array-viewer.php, interactivity in a Javascript file array-viewer.js, and styling in a CSS file, array-viewer.css. The file you are looking at now, example.php, shows you how things work.</p>

<p>If you want something fancier, I recommend the Krumo debugging tool, having used it before as part of the Devel module for the Drupal CMS.</p>

<h2>Usage</h2>

<p>If you want collapsible divs in HTML, create divs with a class 'array_container' that contain exactly two other divs: the first with a class 'array_key' and the second with a class 'array_data'. The 'array_key' div must contain a short string functioning as caption or title, the 'array_data' div may contain anything, including further 'array_container' divs. See "HTML output" for an example.</p>

<p>These divs can be produced automatically using the print_c() function included in array-viewer.php.</p>

<p>Once you have generated your HTML, include the javascript array-viewer.js. This will add an event listener to all divs with class 'array_container' and then hide all divs with class 'array_data'. The hiding by appending a class 'closed', so you will need to include CSS that defines .closed as having a display: none. You can use the included array-viewer.css for this.</p>

<?php

require_once('array-viewer.php');

define ('CRLF', "\r\n");

$foods = array('plants' => array('fruits', 'vegetables'), 'animals' => 'meat', 'mixed' => array('pies' => 'pies'));

print CRLF . "<h2>Output of print_r</h2>";
print CRLF . "<pre>";

print_r($foods);

print CRLF . "</pre>";

print CRLF . "<h2>Output of print_c</h2>\n<p>(Click on grey areas to unfold or collapse.)</p>";

print_c($foods);

print CRLF . "<h2>HTML output of print_c</h2>";

ob_start();
print_c($foods);
$output = ob_get_clean();
print CRLF . "<pre>";
print str_replace(array('<', '>'), array('&lt;', '&gt;'), $output);
print CRLF . "</pre>";

print CRLF . "<h2>CSS</h2>";
print CRLF . "<pre>";

readfile('array-viewer.css');

print CRLF . "</pre>";
?>

    <script type="text/javascript" src="array-viewer.js"></script>

  </body>
</html>

