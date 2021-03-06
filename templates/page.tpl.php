<?php if ($zentropy_html5): ?>
<!doctype html>
<html lang="<?php echo $language->language;?>" dir="<?php echo $language->dir;?>" class="no-js">
  <head profile="http://www.w3.org/1999/xhtml/vocab">
<?php else: ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php echo $language->language;?>" dir="<?php echo $language->dir;?>" class="no-js">
  <head>
<?php endif; ?>
    <title><?php echo $head_title; ?></title>
    <?php echo $head; ?>

    <meta charset="utf-8" />

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo $styles; ?>
    <?php echo $scripts; ?>
  </head>

  <body class="<?php echo $body_classes; ?>">

    <div id="page">

    <!-- ______________________ HEADER _______________________ -->

    <?php if ($zentropy_html5): ?>
    <header id="header" role="banner">
    <?php else: ?>
    <div id="header" role="banner">
    <?php endif; ?>

      <?php if ($header_top): ?>
        <div id="header-top-region">
          <?php echo $header_top; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($secondary_links)): ?>
        <?php if ($zentropy_html5): ?>
        <nav id="secondary-navigation" role="navigation" class="menu">
        <?php else: ?>
        <div id="secondary-navigation" class="menu">
        <?php endif; ?>

        <?php if (function_exists('i18nmenu_translated_tree')): ?>
          <?php echo i18nmenu_translated_tree('secondary-links'); ?>
        <?php else: ?>
          <?php echo menu_tree('secondary-links'); ?>
        <?php endif; ?>

        <?php if ($zentropy_html5): ?>
        </nav><!-- /#navigation -->
        <?php else: ?>
        </div><!-- /#navigation -->
        <?php endif; ?>
      <?php endif; ?>

      <div id="logo-title">

        <?php if (!empty($logo)): ?>
          <a href="<?php echo $front_page; ?>" title="<?php echo t('Home'); ?>" rel="home" id="logo">
            <img src="<?php echo $logo; ?>" alt="<?php echo t('Home'); ?>"/>
          </a>
        <?php endif; ?>

        <div id="name-and-slogan">
          <?php if (!empty($site_name)): ?>
            <h1 id="site-name">
              <a href="<?php echo $front_page ?>" title="<?php echo t('Home'); ?>" rel="home"><span><?php echo $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan"><?php echo $site_slogan; ?></div>
          <?php endif; ?>
        </div><!-- /#name-and-slogan -->

      </div><!-- /#logo-title -->

      <?php if ($header): ?>
        <div id="header-region">
          <?php echo $header; ?>
        </div>
      <?php endif; ?>

    <?php if ($zentropy_html5): ?>
    </header><!-- /#header -->
    <?php else: ?>
    </div><!-- /#header -->
    <?php endif; ?>

    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix" role="main">

      <?php if (!empty($primary_links)): ?>
        <?php if ($zentropy_html5): ?>
        <nav id="navigation" role="navigation" class="menu">
        <?php else: ?>
        <div id="navigation" class="menu">
        <?php endif; ?>

        <?php if (function_exists('i18nmenu_translated_tree')): ?>
          <?php echo i18nmenu_translated_tree('primary-links'); ?>
        <?php else: ?>
          <?php echo menu_tree('primary-links'); ?>
        <?php endif; ?>

        <?php if ($zentropy_html5): ?>
        </nav><!-- /#navigation -->
        <?php else: ?>
        </div><!-- /#navigation -->
        <?php endif; ?>
      <?php endif; ?>

      <div id="body">

        <?php if ($breadcrumb || $mission || $messages || $help || ($tabs && !zentropy_tabs_float())): ?>
          <div id="content-header">

            <?php echo $breadcrumb; ?>

            <?php if ($mission): ?>
              <div id="mission"><?php echo $mission; ?></div>
            <?php endif; ?>

            <?php echo $messages; ?>

            <?php echo $help; ?>

            <?php if ($tabs && !zentropy_tabs_float()): ?>
              <div class="tabs"><?php echo $tabs; ?></div>
            <?php endif; ?>

          </div><!-- /#content-header -->
        <?php endif; ?>

        <?php if ($body_top): ?>
          <div id="body-top">
            <?php echo $body_top; ?>
          </div><!-- /#body-top -->
        <?php endif; ?>

        <div id="content">
          <div id="content-inner" class="inner column center">

            <?php if ($content_top): ?>
              <div id="content-top">
                <?php echo $content_top; ?>
              </div><!-- /#content-top -->
            <?php endif; ?>

            <?php if ($title): ?>
              <h1 class="title"><?php echo $title; ?></h1>
            <?php endif; ?>

            <div id="content-area">

              <?php echo $content; ?>

              <?php if ($content_area): ?>
                <?php echo $content_area;?>
              <?php endif;?>

            </div><!-- /#content-area -->

            <?php if (theme_get_setting('zentropy_feed_icons')): ?>
              <?php echo $feed_icons; ?>
            <?php endif; ?>

            <?php if ($content_bottom): ?>
              <div id="content-bottom">
                <?php echo $content_bottom; ?>
              </div><!-- /#content-bottom -->
            <?php endif; ?>

            </div><!-- /#content-inner -->
          </div><!-- /#content -->

          <?php if ($left): ?>
            <?php if ($zentropy_html5): ?>
            <aside id="sidebar-first" class="column sidebar first" role="complementary">
            <?php else: ?>
            <div id="sidebar-first" class="column sidebar first">
            <?php endif; ?>

              <div id="sidebar-first-inner" class="inner">
                <?php echo $left; ?>
              </div>

            <?php if ($zentropy_html5): ?>
            </aside><!-- /#sidebar-left -->
            <?php else: ?>
            </div><!-- /#sidebar-left -->
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($right): ?>
            <?php if ($zentropy_html5): ?>
            <aside id="sidebar-second" class="column sidebar second" role="complementary">
            <?php else: ?>
            <div id="sidebar-second" class="column sidebar second">
            <?php endif; ?>

              <div id="sidebar-second-inner" class="inner">
                <?php echo $right; ?>
              </div>

            <?php if ($zentropy_html5): ?>
            </aside><!-- /#sidebar-right -->
            <?php else: ?>
            </div><!-- /#sidebar-right -->
            <?php endif; ?>
          <?php endif; ?>

          <div class="clear clearfix"></div>

        </div><!-- /#body -->

      </div><!-- /#main -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>

        <?php if ($zentropy_html5): ?>
        <footer id="footer">
        <?php else: ?>
        <div id="footer">
        <?php endif; ?>

          <div id="footer-inner">

            <?php if ($footer_block): ?>
              <div id="footer-region">
              <?php echo $footer_block; ?>
              </div><!-- /#footer-region -->
            <?php endif; ?>

            <?php if ($footer_message): ?>
              <div id="footer-message">
                <?php echo $footer_message; ?>
              </div><!-- /#footer-message -->
            <?php endif; ?>

          </div><!-- /#footer-inner -->

        <?php if ($zentropy_html5): ?>
        </footer><!-- /#footer -->
        <?php else: ?>
        </div><!-- /#footer -->
        <?php endif; ?>

      <?php endif; ?>

    </div><!-- /#page -->

	  <?php if ($outside || ($tabs && zentropy_tabs_float())): ?>
	  <div id="outside-region">
	    <?php echo $outside; ?>
	    
	    <?php if ($tabs && zentropy_tabs_float()): ?>
	      <div id="floating-tabs"><?php echo $tabs; ?></div>
	    <?php endif; ?>
	  </div><!-- /#outside-region -->
	  <?php endif; ?>

    <?php echo $closure; ?>

    <?php if(zentropy_ga_enabled()): ?>
      <!-- Google Analytics : mathiasbynens.be/notes/async-analytics-snippet -->
      <script type="text/javascript">
        <!--//--><![CDATA[//><!--
        var _gaq=[['_setAccount','<?php print theme_get_setting('zentropy_ga_trackingcode');?>'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
        //--><!]]>
      </script>
    <?php endif;?>

  </body>
</html>
