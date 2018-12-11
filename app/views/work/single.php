<?php 
	$post = $data['post']; 
	$link = '<a href="' . $post['category'][0] .'">' . $post['category'][0] . '</a>';
	if (count($post['category']) > 1) {
		$link = '<a href="' . $post['category'][0] .'">' . $post['category'][1] . '</a>';
	}
?>
<?php getHeader(array("nav" => $data['sitenav'], "headerdata" => $data['headerdata'])); ?>
<?php 
// Header
// title | Sub title | photo | Color | 
?>
<?php getComponent("pageheader", $data['pageheader']); ?>
<article class="container">
	<div class="meta">
		Published on <?= $post['pubdate'] ?> | 
		visit <?php echo $link; ?>
	</div>
	<div class="post">
		<?= $post['content'] ?>
	</div>

	<div class="tags-wrap">
		<?php //getComponent("tag_list", $post['tagsarr']); ?>
	</div>
	<p>
		<a href="/work/" class="btn">&laquo; back to work list</a>
	</p>
</article>
<?php getFooter($data['footerdata']); ?>