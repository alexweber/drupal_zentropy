<?php if ($zentropy_html5): ?>
<article class="node <?php echo $classes; ?>" id="node-<?php echo $node->nid; ?>">
<?php else: ?>
<div class="node <?php echo $classes; ?>" id="node-<?php echo $node->nid; ?>">
<?php endif; ?>
  <div class="node-inner">

    <?php if ($zentropy_html5): ?>
      <header>    
    <?php else: ?>
      <div class="node-header">
    <?php endif; ?>

      <?php if (!$page): ?>
        <h2 class="title"><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h2>
      <?php endif; ?>

      <?php echo $picture; ?>

      <?php if ($submitted): ?>
        <span class="submitted"><?php echo $submitted; ?></span>
      <?php endif; ?>
    
    <?php if ($zentropy_html5): ?>
      </header>    
    <?php else: ?>
      </div><!-- /.node-header -->
    <?php endif; ?>

    <div class="content">
      <?php echo $content; ?>
    </div><!-- /.content -->

    <?php if ($zentropy_html5): ?>
      <footer>    
    <?php else: ?>
      <div class="node-footer">
    <?php endif; ?>

      <?php if ($terms): ?>
        <div class="taxonomy">
          <?php echo $terms; ?>
        </div><!-- /.taxonomy -->
      <?php endif;?>

      <?php if ($links): ?> 
        <div class="links">
          <?php echo $links; ?>
        </div><!-- /.links -->
      <?php endif; ?>
    
    <?php if ($zentropy_html5): ?>
      </footer>    
    <?php else: ?>
      </div><!-- /.node-footer -->
    <?php endif; ?>

  </div><!-- /.node-inner -->
<?php if ($zentropy_html5): ?>
</article><!-- /.node -->
<?php else: ?>
</div><!-- /.node-->
<?php endif; ?>
