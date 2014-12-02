<?php getHeader(); ?>

<?php getComponent("pageheader", $data['headerdata']); ?>

<section class="blog-list-page">

	<div class="container">
		<?php getComponent("bloglist", $data['list']); ?>
		<?php getComponent("pagination", array($data['prevpage'], $data['nextpage'], 'blog', $data['maxpagecount'])); ?>
	</div>

</section>

<?php getFooter(); ?>