<?php
include './Auth/EpiCurl.php';
include './Auth/EpiOAuth.php';
include './Auth/EpiTwitter.php';
include './Auth/secret.php';
$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$twitterObj->setToken($_GET['oauth_token']);
$token = $twitterObj->getAccessToken();
$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);

// save to cookies - token changes each time they login
setcookie('oauth_token', $token->oauth_token);
setcookie('oauth_token_secret', $token->oauth_token_secret);

header('Location:stream.php');

?>