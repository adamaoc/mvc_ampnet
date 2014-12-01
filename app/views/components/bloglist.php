<?php

foreach($data as $post) : ?>

<a href="/blog/<?= $post['slug'] ?>" class="worksbox <?= $post['category'] ?>">
	<h3><?= $post['title'] ?></h3>
	<small><?= $post['category'] ?> | <?= $post['pubdate'] ?></small>

	<div class="imgwrap">
		<img src="<?= $post['imgthumb'] ?>" alt="<?= $post['title'] ?>" />
	</div>

	<article class="excerpt">
		<?= $data['excerpt'] ?>
	</article>
</a>
<?php endforeach; ?>