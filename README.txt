$Id$

CONTENTS OF THIS FILE
---------------------
 * Introduction
 * Features
 * Installation
 * Useful Information
 * Developers

INTRODUCTION
------------

Zentropy is a base theme which attempts to bring the best of a couple worlds together:

 * It converts the core template files to HTML5 markup (based on "Boron" * all credit to Scott Vandehey (spaceninja) of Metal Toad Media)
 * It adds useful features from the classic Drupal 6 "Basic" theme
 * It includes an HTMl5-friendly CSS Reset and other tweaks & best practices from Paul Irish's "HTML5 Boilerplate" (http://html5boilerplate.com/)
 * It also features a bunch of other goodies thrown in: more regions, Google Analytics integration, more htaccess tweaks, support for Modernizr (http://www.modernizr.com/) and all sorts of awesomeness

Like other minimal base themes, such as Zen, Stark and Boron, Zentropy includes only a few lines of layout-driven CSS, and markup that is search engine optimized.

WHAT IS THE DIFFERENCE BETWEEN BASIC, BORON AND ZENTROPY?

What really sets Zentropy apart is that apart from bringing together great ideas from both afforementioned themes, it includes all of the awesomeness from Paul Irish's HTML5 Boilerplate for a rock-solid HTML5 starter theme.

Think of it as a fork of all 3 projects merged into one big steaming pile of awesome.

FEATURES

 * Extra regions and classes for more theming flexibility
 * Performance and compatibility improvements from HTML5 Boilerplate
 * CSS3 Feature detection from Modernizr
 * Full HTML5 CSS Reset
 * Simple Google Analytics integration via theme settings
 * Bartik compatibility (most of Bartik's goodness is maintained)
 * HTML5 doctype and meta content-type
 * Header and Footer sections marked up with header and footer elements
 * Navigation marked up with nav elements
 * Sidebars marked up with aside elements
 * Nodes marked up with article elements containing header and footer elements
 * Comments marked up as articles nested within their parent node article
 * Blocks marked up with section elements
 * HTML5 shim script suggested for full IE compatibility
 * Search form uses the new input type="search" attribute
 * WAI-ARIA accessibility roles added to primary elements
 * Updates all core modules to HTML5 markup

INSTALLATION

 * Extract the theme in your sites/all/themes/ directory and enable it
 
 * Install Modernizr:
  - Download from: http://www.modernizr.com/
  - Copy to: /path/to/theme/js/libs/modernizr-1.6.min.js
  - Uncomment line 76 in html.tpl.php
 
 * If you are not using Modernizr or are using a custom download without the HTML5 Shim:
 * To support HTML5 in Internet Explorer and other legacy browsers please install HTML5Shim:
  - Download from: http://code.google.com/p/html5shim/
  - Copy to: /path/to/theme/js/libs/html5.js
  - Uncomment line 66 in html.tpl.php
 
 * To support transparent PNGs in IE6 and below please install DDBelatedPNG:
  - Download from: http://www.dillerdesign.com/experiment/DD_belatedPNG/
  - Copy to: /path/to/theme/js/libs/dd_belatedpng.js
  - Add the class "png_bg" to any elements which have a PNG background
  - Uncomment lines 91 and 92 in html.tpl.php

USEFUL INFORMATION

 * Zentropy uses Paul Irish's strategy of using a conditional HTML tag to avoid using conditional
   stylesheet includes. In order to apply a style for ie6 for example:
   
   - html.ie6 #selector { ... }
   - htm.ie7.ie6 #selector { ... }

 * Please file issues in the project's issue queue: http://drupal.org/project/zentropy

DEVELOPERS

Zentropy is developed by Alex Weber (http://drupal.org/user/850856) and sponsored by Webdrop (http://webdrop.net.br)
