<!-- templates/show.php -->
<?php $title = $post['post_title'] ?>

<?php ob_start() ?>
<h1><?= $post['post_title'] ?></h1>

<div class="date"><?= $post['post_date'] ?></div>
<div class="body">
  <?= $post['post_text'] ?>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
