<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Регистрация</title>

	<link rel="stylesheet" href="/template/css/styles-register.css">
</head>
<body>
	<?php include ROOT . '/views/layouts/header.php' ?>
	<?php if($result): ?>
		<div class= "errors">Вы успешно зарегистрированы! <br>
			<div class="to-home"><a href="/book" class="button">Перейти на главную</a></div>
		</div>
	<?php else: ?>
		<div class="errors">
		<?php if (isset($errors) && is_array($errors)): ?>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li> - <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
		
		<div id="container">
		
			<form method="post" action="#">
	
				<h2>Регистрация</h2>
				<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required>
	
				<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
	
				<div id="lower">
					<input type="submit" name="submit" value="Регистрация">
				</div>
			</form>
		</div>
	<?php endif; ?>
</body>
</html>
