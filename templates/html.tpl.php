<?php
// $Id$

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><?php print $doctype; ?>
<?php $html_tag_attrs = "lang=\"{$language->language}\" dir=\"{$language->dir}\" {$rdf->version}{$rdf->namespaces}";?>
<!-- If you don't care about older browsers remove the following declarations -->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html <?php echo $html_tag_attrs;?> class="no-js ie6" <![endif]-->
<!--[if IE 7 ]> <html <?php echo $html_tag_attrs;?> class="no-js ie7" <![endif]-->
<!--[if IE 8 ]> <html <?php echo $html_tag_attrs;?> class="no-js ie8" <![endif]-->
<!--[if IE 9 ]> <html <?php echo $html_tag_attrs;?> class="no-js ie9" <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php echo $html_tag_attrs;?> class="no-js"> <!--<![endif]-->

<head<?php print $rdf->profile; ?>>

  <?php print $head; ?>
  
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame  -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Prevent blocking -->
  <!--[if IE 6]><![endif]-->
  
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php /*
  ### IMPORTANT: If you are NOT using Modernizr OR are using a custom version without the HTML5 Shim,
      you should install it manually and uncomment line 66 ###
  <!-- Install html5shiv to enable full HTML5 support. See README.txt -->
  <!--[if LT IE 9]>
  <!--<script src="js/libs/html5.js"></script>
  <![endif]-->
  */ ?>

  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="css/handheld.css">  -->

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <!-- IMPORTANT: Uncomment the following line and install Modernizr to enable full HTML5 support. See README.txt -->
  <!--<script src="js/libs/modernizr-1.6.min.js"></script>-->

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <!-- Javascript at the bottom for fast page loading -->
  <?php print $scripts; ?>
  
  <!-- Uncomment lines 89 and 90 to support transparent PNGs in IE6 and below -->
  <!--[if lt IE 7 ]>
    <!--<script src="js/libs/dd_belatedpng.js"></script>
    <!--<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->
  
  <?php if (!user_is_logged_in() && theme_get_setting('ga_enable')) :?>
  <!-- Google Analytics : mathiasbynens.be/notes/async-analytics-snippet -->
  <script type="text/javascript">
    <!--//--><![CDATA[//><!--
    var _gaq=[['_setAccount','<?php echo theme_get_setting('ga_trackingcode');?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
    //--><!]]>
  </script>
  <?php endif; ?>
  
</body>
</html>
