<?php getHeader(); ?>

<?php 
	$headerdata = array("title" => "<h1>I am <span>Adam</span> <span>Moore</span> <small>I develop websites <span>and live in Dallas, TX</span></small></h1>", "class" => "homeheader");
	
	getComponent("pageheader", $headerdata); 
?>

<section class="homeabout">
	<h2>About me</h2>
	<div class="img-wrap">
		<img src="/assets/img/about-me.jpg" alt="About Adam Moore and ampnet media - Dallas web development" />
	</div>
	<p class="text-wrap">I am a web developer out of Dallas, Texas that wants to help your company dive into the vast ocean of the Internet. I can make sure that you'll be found with first class SEO (search engine optimization). I'll make sure you'll be noticed and your users have a great experience with a great design focused on UX/UI (User Experience/User Interface) and your business goals in mind. I will also make sure you're able to connect with your audience like never before with outstanding social media integration, development, and consulting.</p>
</section>

<section class="homecontent">
	<h2>Core strengths include:</h2>
	<ul class="strength-list">
		<li>Front-end (HTML | CSS | JS | RWD)</li>
		<li>Back-end (PHP | MySQL)</li>
		<li>Platforms (WordPress)</li>
	</ul>
</section>	

<?php getComponent("besection"); ?>
<?php getComponent("recentwork"); ?>
<?php getComponent("recentblog"); ?>

<?php getFooter(); ?>