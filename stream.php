<?php
include './Auth/EpiCurl.php';
include './Auth/EpiOAuth.php';
include './Auth/EpiTwitter.php';
include './Auth/secret.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<title>Twendeley - A Mendeley + twitter mashup</title>
		<script type="text/JavaScript" src="jquery.js"></script> 
		<script type="text/JavaScript" src="stream.js"></script> 
	</head>
<body style="padding:0;background:#333">
	<div id="wrapper" style="background:#fff;border:1px solid #ccc;padding:15px;margin:0 auto;width:750px">
	<div style="color:#666;border-bottom:1px solid #ccc;margin-bottom:15px;padding:10px;width:600px;font-size:90%">
		<h2>What's happening?</h2>
		This demonstrates how academic data pulled from the new <a href="http://www.mendeley.com/oapi/methods/" style="color:#009900">Mendeley APIs</a> can be mashed up. In this case with twitter. Hopefully it
		will inspire some creative developers or academics to do even more with the APIs.
	</div>
	<?php
	if(!($_COOKIE['oauth_token'])) {header('Location:index.php');}
	$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
	$twitterInfo= $twitterObj->get_statusesHome_timeline();
	
	 try{  
	  foreach($twitterInfo as $friend) { 
			
		echo '<div style="margin:10px 0;border-bottom:1px solid #ccc;padding:4px;width:600px">';
			echo '<div style="float:left;width:90px">';
				echo '<img src="'.$friend->user->profile_image_url.'" width="50px"/>';
			echo '</div>';
			echo '<div style="float:left;width:450px">';
				echo '<a href="http://twitter.com/'.$friend->user->screen_name.'/" target="_blank">'.$friend->user->screen_name.'</a><br><span style="color:#666;font-size:90%">'.$friend->created_at.'</span><br>'.urldecode($friend->text); 
				echo '<div id="showArticles'.$friend->id.'" style="margin:10px 0;font-size:90%;color:#555"><br>';
					//Use Mendeley API to find articles similar to tweet
				echo '<div id="button'.$friend->id.'">';	
					echo '<a href="#" class="grabArticles" id="'.$friend->id.'" style="background:#669933;text-decoration:none;font-size:95%;color:#f1f1f1;padding:3px;border:1px dotted #ccc">Load relevant articles from Mendeley</a>';
				echo '</div>';
				echo '<input name="text" id="text'.$friend->id.'" style="display:none" value="'.urlencode($friend->text).'" />';
					//getMendeleySearch($friend->text);
				echo '<div id="hidden'.$friend->id.'" style="display:none"><img src="load.gif"></div>';
				echo '</div>';
			echo '</div>';
		echo '<div style="clear:both"></div></div>';
	  }  
	}catch(EpiTwitterException $e){  
	  echo $e->getMessage();  
	} 
	
	?>
	</div>
</body>
</html>