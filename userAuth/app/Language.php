<?php 

$_SESSION['en'] = !isset($_SESSION['lang']) ? 'en' : 'ru';
if($_GET['lang'])
{
    $_SESSION['lang'] = $_GET['lang'] == 'en' ? 'en' : 'ru'; 
}

if($_SESSION['lang'] == 'en')
{
    $lang = array(
        'signin' => 'Sign in',
        'password' => 'password',
        'name' => 'Your name',
        'signup'=> 'Sign Up',
        'welcome' => 'Hello ',
        'photo' => 'Change photo',
        'logout' => 'Log out',
        'email' => 'Your email',
    );
}else {
    $lang = array(
        'signin' => 'Войти',
        'password' => 'пароль',
        'name' => 'Ваше имя',
        'signup'=> 'Регистрация',
        'welcome' => 'Привет ',
        'photo' => 'Изменить фото',
        'logout' => 'Выход',
        'email' => 'Ваш email',
    );
}