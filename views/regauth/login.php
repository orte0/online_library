<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Вход</title>

	<link rel="stylesheet" href="/template/css/styles-login.css">
</head>
<body>
	<?php include ROOT . '/views/layouts/header.php' ?>
	
	<div class="errors">
		<?php if (isset($errors) && is_array($errors)): ?>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li> - <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>	
	</div>
	

	<div id="container">
		<form method="post" action="#" >
			<h2>Вход</h2>
			<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required>

			
			<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>

			<div id="lower">
				<input type="submit" name="submit" value="Вход">
		</form>
	</div>
	
</body>
</html>
	
	
	
	