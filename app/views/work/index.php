<?php getHeader(); ?>

<?php 
	$headerdata = array("title" => "<h1>work <small>ampnet<span>(media)</span></small></h1>", "class" => "homeheader");
	
	getComponent("pageheader", $headerdata); 
?>
<section class="recent-work">

	<div class="container">
		<h3 class="page-title">
			<span><?= $data['title']; ?></span> - <?= $data['slogan'] ?>
		</h3>
	</div>

	<div class="container">
		<?php getComponent("workslist", $data['list']); ?>
	</div>

</section>


<?php getFooter(); ?>