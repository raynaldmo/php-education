<!-- templates/list.php -->
<?php $title = 'List of Posts' ?>

<?php ob_start() ?>
<h1>List of Posts</h1>
<ul>
  <?php foreach ($posts as $post): ?>
    <li>
      <a href="/show/<?= $post['post_id'] ?>">
        <?= $post['post_title'] ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>


