<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $language->language ?>" lang="<?php echo $language->language ?>" dir="<?php echo $language->dir ?>">
  <head>
    
    <title><?php echo $head_title; ?></title>
    <?php echo $head; ?>
    <?php echo $styles; ?>
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php echo $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
<!--[if IE 8]><style type="text/css" media="all">@import "<?php echo $base_path . path_to_theme() ?>/css/ie8.css";</style><![endif]-->
    <?php echo $scripts; ?>
  </head>

  <body class="<?php echo $body_classes; ?>">
	<?php if ($above_top): ?>
	<div id="above_top-region">
	  <?php echo $above_top; ?>
	</div><!-- /above_top-region -->
	<?php endif; ?>
	
    <div id="skip"><a href="#content"><?php echo t('Skip to Content'); ?></a> <a href="#navigation"><?php echo t('Skip to Navigation'); ?></a></div>  
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
        </div> <!-- /name-and-slogan -->

      </div> <!-- /logo-title -->

      <?php if ($header): ?>
        <div id="header-region">
          <?php echo $header; ?>
        </div>
      <?php endif; ?>

      <?php echo $search_box; ?>

    </div> <!-- /header -->

    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
    
      <div id="content">
        <div id="content-inner" class="inner column center">

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php echo $content_top; ?>
            </div> <!-- /content-top -->
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

            </div> <!-- /content-header -->
          <?php endif; ?>

          <div id="content-area">
            <?php echo $content; ?>
          </div> <!-- /content-area -->

          <?php echo $feed_icons; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php echo $content_bottom; ?>
            </div><!-- /content-bottom -->
          <?php endif; ?>

          </div>
        </div> <!-- /content-inner /content -->

        <?php if (!empty($primary_links) || !empty($secondary_links)): ?>
          <div id="navigation" class="menu <?php if (!empty($primary_links)) { echo "with-main-menu"; } if (!empty($secondary_links)) { echo " with-sub-menu"; } ?>">
            <?php if (!empty($primary_links)){ echo theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
            <?php if (!empty($secondary_links)){ echo theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); } ?>
          </div> <!-- /navigation -->
        <?php endif; ?>

        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
              <?php echo $left; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-left -->

        <?php if ($right): ?>
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner">
              <?php echo $right; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-second -->

      </div> <!-- /main -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
        <div id="footer">
          <?php echo $footer_message; ?>
          <?php echo $footer_block; ?>
        </div> <!-- /footer -->
      <?php endif; ?>

    </div> <!-- /page -->
    <?php echo $closure; ?>
  </body>
</html>
