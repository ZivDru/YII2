<?php

$path = __DIR__ . '/user_passwords.php';
$pass = file_exists($path) ? include $path : [];

return array_merge($pass, [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'uploadPath' => dirname(__DIR__) . DIRECTORY_SEPARATOR  . 'public' . DIRECTORY_SEPARATOR  . 'uploads',
]);
