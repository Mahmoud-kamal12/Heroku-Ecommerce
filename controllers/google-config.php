<?php

$clientID = '150184604237-88i8ulueute38k9igqr44r1lsn66rmkb.apps.googleusercontent.com';
$clientSecret = 'Ayk1QgTHvJQDVhbZipjx6OUv';
$redirect = 'http://localhost:8088/Colage%20Project/E-Commerce/controllers/google.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirect);

$client->addScope('profile');
$client->addScope('email');

