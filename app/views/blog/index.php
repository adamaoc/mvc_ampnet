<?php getHeader(); ?>

<?php getComponent("pageheader", $data['headerdata']); ?>

<section class="recent-work">

	<div class="container">
		<h3 class="page-title">
			<span><?= $data['title']; ?></span> - <?= $data['slogan'] ?>
		</h3>
	</div>

	<div class="container">
		<?php getComponent("bloglist", $data['list']); ?>
		<?php getComponent("pagination", array($data['prevpage'], $data['nextpage'], 'blog', $data['maxpagecount'])); ?>
	</div>

</section>

<?php getFooter(); ?>