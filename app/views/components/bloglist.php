<section class="recent-work">
	<div class="container">
		<h3>Recent Blog Post</h3>
		<ul class="work-list">
			<?php foreach($data as $post) : ?>
			<li>
				<a href="/blog/<?= $post['slug'] ?>/" class="worksbox <?= $post['category'] ?>">
					<h3><?= $post['title'] ?></h3>
				</a>

				<small><?= $post['category'] ?> | <?= $post['pubdate'] ?></small>

				<a href="">
					<div class="imgwrap">
						<img src="<?= $post['imgthumb'] ?>" alt="<?= $post['title'] ?>" />
					</div>

					<article class="excerpt">
						<?= $post['excerpt'] ?>
					</article>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>