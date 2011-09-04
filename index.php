<?php
include './Auth/EpiCurl.php';
include './Auth/EpiOAuth.php';
include './Auth/EpiTwitter.php';
include './Auth/secret.php';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<title>Twendeley - A Mendeley + twitter mashup</title>	
	</head>
<body style="padding:0;background:#333">
	<div id="wrapper" style="background:#fff;border:1px solid #ccc;padding:15px;margin:0 auto;width:750px;min-height:800px">
		<div style="font-weight:bold;font-size:100%">Tw<span style="color:#3861a4">endeley</span> - A Mendeley + twitter mashup</div>
		<div style="color:#666;margin-bottom:15px;padding:10px;width:600px;font-size:90%">
			<h2>What's happening?</h2>
			
			
			This is a very crude mashup I whipped up one weekend using the new <a href="http://dev.mendeley.com/">Mendeley APIs</a> to find articles similar to tweets from those you follow. Also see this <a href="http://www.nytimes.com/external/readwriteweb/2010/04/29/29readwriteweb-mendeley-throws-open-the-doors-to-academic-43750.html">NYTimes and RWW article </a> for more Mendeley API info.
			<br><br>It uses twitter OAuth to securely obtain your twitter list without having to provide your password. Click the sign in button below and you will be taken to twitter 
			to approve this application accessing your twitter stream. It can be revoked at any time by going to your <a href="http://twitter.com/settings/connections/">twitter account</a>.
			You will then be sent back to this site and will see your friends' most recent tweets along with potentially relevant Mendeley articles.
			<br><br>
			It is merely a proof-of-concept tool in using the <a href="http://dev.mendeley.com/">Mendeley APIs</a>.
			<br><br>
			Jason | Research Director | <a href="http://mendeley.com/about-us/">Mendeley</a>
			<br>
			<a href="<?php echo $twitterObj->getAuthenticateUrl(); ?>" >
				<div style="margin-top:20px;width:160px;background:#fff;padding:10px;border:1px dotted #669933">
				<img src="twitterSign.png">			
				</div>	
			</a>
		</div>
	</div>
</body>
</html>