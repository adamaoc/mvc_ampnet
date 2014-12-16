
<section class="container">
	<form class="" action="" method="POST">
		<label for="username">User Name:</label>
		<input type="text" id="username" name="username" />
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" />

		<input type="hidden" name="token" value="<?= $data ?>" />

		<input type="submit" value="Login" />
	</form>
</section>