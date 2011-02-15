<div class="<?php echo $classes .' '. $zebra; ?> clearfix">
  <div class="comment-inner">

    <?php if ($title): ?>
      <h3 class="title"><?php echo $title ?></h3>
    <?php endif; ?>

    <?php if ($new) : ?>
      <span class="new"><?php echo drupal_ucfirst($new); ?></span>
    <?php endif; ?>

    <?php echo $picture; ?>

    <div class="submitted">
      <?php echo $submitted; ?>
    </div><!-- /.submitted -->

    <div class="content">
      <?php echo $content ?>
      <?php if ($signature): ?>
        <div class="user-signature clearfix">
          <?php echo $signature; ?>
        </div><!-- /.user-signature -->
      <?php endif; ?>
    </div><!-- /.content -->

    <?php if ($links): ?>
      <div class="links">
        <?php echo $links; ?>
      </div><!-- /.links -->
    <?php endif; ?>  

  </div><!-- /.comment-inner -->
</div><!-- /.comment -->
