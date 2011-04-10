<?php if ($zentropy_html5): ?>
<article class="<?php echo $classes .' '. $zebra; ?> clearfix">
<?php else: ?>
<div class="<?php echo $classes .' '. $zebra; ?> clearfix">
<?php endif; ?>
  <div class="comment-inner">

    <?php if ($zentropy_html5): ?>
      <header>
    <?php else: ?>
      <div class="comment-header">
    <?php endif; ?>

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

    <?php if ($zentropy_html5): ?>
      </header>
    <?php else: ?>
      </div><!-- /.comment-header -->
    <?php endif; ?>

    <div class="content">
      <?php echo $content ?>
    </div><!-- /.content -->

    <?php if ($zentropy_html5): ?>
      <footer>
    <?php else: ?>
      <div class="comment-footer">
    <?php endif; ?>

      <?php if ($signature): ?>
        <div class="user-signature clearfix">
          <?php echo $signature; ?>
        </div><!-- /.user-signature -->
      <?php endif; ?>

      <?php if ($links): ?>
        <div class="links">
          <?php echo $links; ?>
        </div><!-- /.links -->
      <?php endif; ?>

    <?php if ($zentropy_html5): ?>
      </footer>
    <?php else: ?>
      </div><!-- /.comment-footer -->
    <?php endif; ?>

  </div><!-- /.comment-inner -->
<?php if ($zentropy_html5): ?>
</article><!-- /.comment -->
<?php else: ?>
</div><!-- /.comment -->
<?php endif; ?>
