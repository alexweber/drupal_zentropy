<div class="node <?php echo $classes; ?>" id="node-<?php echo $node->nid; ?>">
  <div class="node-inner">

    <?php if (!$page): ?>
      <h2 class="title"><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h2>
    <?php endif; ?>

    <?php echo $picture; ?>

    <?php if ($submitted): ?>
      <span class="submitted"><?php echo $submitted; ?></span>
    <?php endif; ?>

    <div class="content">
      <?php echo $content; ?>
    </div><!-- /.content -->

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

  </div><!-- /.node-inner -->
</div><!-- /.node-->
