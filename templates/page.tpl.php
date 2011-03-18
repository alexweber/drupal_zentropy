<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php echo $language->language;?>" dir="<?php echo $language->dir;?>" class="no-js">
  <head>
    <title><?php echo $head_title; ?></title>
    <?php echo $head; ?>
      
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo $styles; ?>
    <?php echo $scripts; ?>
  </head>

  <body class="<?php echo $body_classes; ?>">

	  <?php if ($above_top): ?>
	  <div id="above_top-region">
	    <?php echo $above_top; ?>
	  </div><!-- /#above_top-region -->
	  <?php endif; ?>

    <div id="page">

    <!-- ______________________ HEADER _______________________ -->

    <div id="header">

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

      <?php echo $search_box; ?>

    </div><!-- /#header -->

    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
    
      <div id="content">
        <div id="content-inner" class="inner column center">

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php echo $content_top; ?>
            </div><!-- /#content-top -->
          <?php endif; ?>

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">

              <?php echo $breadcrumb; ?>

              <?php if ($title): ?>
                <h1 class="title"><?php echo $title; ?></h1>
              <?php endif; ?>

              <?php if ($mission): ?>
                <div id="mission"><?php echo $mission; ?></div>
              <?php endif; ?>

              <?php echo $messages; ?>

              <?php echo $help; ?> 

              <?php if ($tabs): ?>
                <div class="tabs"><?php echo $tabs; ?></div>
              <?php endif; ?>

            </div><!-- /#content-header -->
          <?php endif; ?>

          <div id="content-area">
            <?php echo $content; ?>
            
            <?php if ($content_area): ?>
              <?php echo $content_area;?>
            <?php endif;?>
            
          </div><!-- /#content-area -->

          <?php echo $feed_icons; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php echo $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>

          </div><!-- /#content-inner -->
        </div><!-- /#content -->

        <?php if (!empty($primary_links) || !empty($secondary_links)): ?>
          <div id="navigation" class="menu <?php if (!empty($primary_links)) { echo "with-main-menu"; } if (!empty($secondary_links)) { echo " with-sub-menu"; } ?>">
            <?php if (!empty($primary_links)){ echo theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
            <?php if (!empty($secondary_links)){ echo theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); } ?>
          </div><!-- /#navigation -->
        <?php endif; ?>

        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
              <?php echo $left; ?>
            </div>
          </div>
        <?php endif; ?><!-- /#sidebar-left -->

        <?php if ($right): ?>
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner">
              <?php echo $right; ?>
            </div>
          </div>
        <?php endif; ?><!-- /#sidebar-second -->

      </div><!-- /#main -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
        <div id="footer">
          <div id="footer-inner">
            <?php echo $footer_message; ?>
            <?php echo $footer_block; ?>
          </div><!-- /#footer-inner -->
        </div><!-- /#footer -->
      <?php endif; ?>

    </div><!-- /#page -->
    <?php echo $closure; ?>
    
    <?php if(user_is_anonymous()): ?>
    <!-- Google Analytics : mathiasbynens.be/notes/async-analytics-snippet -->
    <script type="text/javascript">
      <!--//--><![CDATA[//><!--
      var _gaq=[['_setAccount','<?php print theme_get_setting('ga_trackingcode');?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
      //--><!]]>
    </script>
    <?php endif;?>
    
  </body>
</html>
