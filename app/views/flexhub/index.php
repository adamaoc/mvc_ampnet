<?php
$loggedin = true;
if(!empty($_POST)) {
	// require_once "app/core/Parsedown.php";
	// Parsedown::instance()->parse()
	$blogspath = $_SERVER['DOCUMENT_ROOT']."/data/blogs/posts/";

	$slug = str_replace(" ", "_", trim(strtolower($_POST['title'])));

	$data = "* ".$_POST['title']."\n";
	$data .= "* ".$_POST['subtitle']."\n";
	$data .= "* ".date('Y-m-d')."\n";
	$data .= "* ".$_POST['category']."\n";
	$data .= "* ".$_POST['banner_img']."\n";
	$data .= "* ".$_POST['banner_color']."\n";
	$data .= "* published\n";
	$data .= "\n";
	$data .= $_POST['post'];
	
	echo "<pre>".$data."</pre>";

	$newpost = $blogspath . $slug . ".md";
	file_put_contents($newpost, $data);

}

if(isset($loggedin)) { ?>

<h1>Backend</h1>
<style>
label {
	display: block;
	width: 100%;
}
</style>
<form method="POST" action"">
	<div>
		<label for="title">Title</label>
		<input type="text" name="title" />
	</div>
	<div>
		<label for="subtitle">SubTitle</label>
		<input type="text" name="subtitle" />
	</div>
	<div>
		<label for="category">Category</label>
		<input type="text" name="category" />
	</div>
	<div>
		<label for="banner_img">Banner Image</label>
		<input type="text" name="banner_img" />
	</div>
	<div>
		<label for="banner_color">Banner Color</label>
		<input type="text" name="banner_color" />
	</div>
	<div>
		<label for="post">Post</label>
		<textarea name="post" style="width: 80%; height: 200px;"></textarea>
	</div>
	<div>
		<input type="submit" value="Publish" />
	</div>
</form>

<?php }else{ ?>
<h1>Login</h1>
<?php } ?>