<?php $post = $data['post']; ?>

<?php getHeader(); ?>
<?php 
// Header
// title | Sub title | photo | Color | 
?>
<?php getComponent("pageheader", $data['headerdata']); ?>
<article class="container">
	<div class="meta">
		Posted on <?= $post['pubdate'] ?> | 
		Category <?= $post['category'] ?>
	</div>
	<div class="post">
		<?= $post['content'] ?>
	</div>

	<div class="tags-wrap">
		<?php foreach ($post['tagsarr'] as $tag) : ?>
			<a href="#"><?= $tag ?></a>
		<?php endforeach; ?>
	</div>
	<p>
		<a href="/work/" class="btn">&laquo; back to work list</a>
	</p>
</article>
<?php getFooter(); ?>
