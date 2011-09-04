<?php
include 'EpiCurl.php';
include 'EpiOAuth.php';
include 'EpiTwitter.php';
include 'secret.php';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$twitterObj->setToken($_GET['oauth_token']);
$token = $twitterObj->getAccessToken();
$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);

// save to cookies
setcookie('oauth_token', $token->oauth_token);
setcookie('oauth_token_secret', $token->oauth_token_secret);

$twitterInfo= $twitterObj->get_accountVerify_credentials();
echo "<h1>Your twitter username is {$twitterInfo->screen_name} and your profile picture is <img src=\"{$twitterInfo->profile_image_url}\"></h1>
<p><a href=\"random.php\">Go to another page and load your friends list from your cookie</p>";
?>
