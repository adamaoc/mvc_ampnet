<?php getHeader(array("nav" => $data['sitenav'], "headerdata" => $data['headerdata'])); ?>

<?php getComponent("pageheader", $data['pageheader']); ?>

<section class="contact">
	<div class="container">

		<div class="contact-form_wrap">
			<h4>Contact Us</h4>
			<?php getComponent("contactForm"); ?>
		</div>

		<section class="container">
			<?php getComponent("social_list", $data['social-data']); ?>
			<hr />
			<?php getComponent("specialties_block", $data['specialties']); ?>
		</section>
	</div>
	
	<?php getComponent("besection", $data['bedata']); ?>
</section>

<?php getFooter($data['footerdata']); ?>
