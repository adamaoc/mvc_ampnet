<div class="worklist">
	<?php foreach($data as $post) : ?>
	<a class="workitem" href="/work/<?= $post['slug'] ?>/">
		<h3><?= $post['title'] ?></h3>
		<small class="meta">
			<?= $post['category'] ?> | <?= $post['pubdate'] ?>
		</small>
		<div class="imgwrap" style="background-image: url(<?= $post['imgthumb'] ?>)"></div>
		<article class="excerpt">
			<?= $post['excerpt'] ?>
		</article>
	</a>
	<?php endforeach; ?>
</div>
