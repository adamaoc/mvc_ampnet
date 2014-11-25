<?php

foreach($data as $post) : ?>

<h3><?= $post['title'] ?></h3>

<small><?= $post['category'] ?> | <?= $post['pubdate'] ?></small>

<div class="imgwrap">
	<img src="<?= $post['imgthumb'] ?>" alt="<?= $post['title'] ?>" />
</div>

<article class="excerpt">
	<?= $data['excerpt'] ?>
</article>

<small class="tags">
	<?php foreach($post['tags'] as $tag) : ?>
		<span><?=$tag?>, </span>
	<?php endforeach; ?>
</small>

<?php endforeach; ?>