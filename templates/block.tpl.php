<div id="block-<?php echo $block->module .'-'. $block->delta ?>" class="<?php echo $block_classes . ' ' . $block_zebra; ?>">
  <div class="block-inner">

    <?php if (!empty($block->subject)): ?>
      <h3 class="title block-title"><?php echo $block->subject; ?></h3>
    <?php endif; ?>

    <div class="content">
      <?php echo $block->content; ?>
    </div><!-- /.content -->

    <?php echo $edit_links; ?>

  </div><!-- /.block-inner -->
</div><!-- /#block -->
