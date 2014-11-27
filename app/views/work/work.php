<?php ?>
<h1>Work</h1>
<?php print_r($data); ?>


<small class="tags">
	<?php foreach($post['tags'] as $tag) : ?>
		<span><?=$tag?>, </span>
	<?php endforeach; ?>
</small>