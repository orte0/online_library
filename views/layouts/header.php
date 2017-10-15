<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OnLi</title>
    <link rel="stylesheet" href="/template/css/stylesheet.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js">
    </script>

</head>
<body>

<header>

    <a href="/"><div class="logo">OnLi - некоммерческая онлайн библиотека</div></a>

    <div class="auth-menu">
        <?php if (User::isGuest()): ?>
        <a href="/user/login/" class="button">Вход</a> 
        <a href="/user/register/" class="button">Регистрация</a>
        <?php else: ?> 
        <a href="/cabinet/" class="button">Кабинет</a>
        <a href="/user/logout/" class="button">Выход</a>
        <?php endif; ?>

    </div>
</header>
