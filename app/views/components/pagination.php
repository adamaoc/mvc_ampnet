<?php 

$section = $data[2];
$prev = $data[0];
$next = $data[1];
$maxpage = $data[3];

$prevlink = "/".$data[2]."/page/".$data[0]."/";
$nextlink = "/".$data[2]."/page/".$data[1]."/";
?>

<div class="pagination">
<?php 
if($prev < 1) {

}else{ ?>
	<a class="prevlink" href="<?= $prevlink?>">back to page <?= $prev ?></a>
<?php } 
if($next > $maxpage) {

}else{
?>
	<a class="nextlink" href="<?= $nextlink?>">next page <?= $next ?></a>
<?php } ?>
</div>