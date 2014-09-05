<?php

	session_start();
	require_once("twitteroauth-master/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
	 
	$search = "#endtimes OR #apocalypse OR #endtime";
	$notweets = 52;
	$consumerkey = "lwPC6jLD7ugRCOZPuEJGJfAO0";
	$consumersecret = "20SxkrDSyUkJr5xRu1VEk6TEI1OY09dYVoyi44ITlyKOzxYxof";
	$accesstoken = "380227311-l7ySkR1gwjW7nZJ8K5hiN99FW0B707lSTeHnPdMk";
	$accesstokensecret = "FmABP8jYRqbeFNIY7JQuNy5tEhUNVcCkf8ANYN1LLGGiP";
	  
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}
	   
	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	 
	$search = str_replace("#", "%23", $search); 
	$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$search."&count=".$notweets);
	  
	echo json_encode($tweets);


	?>	