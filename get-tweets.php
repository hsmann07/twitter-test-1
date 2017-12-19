
<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

if (!empty($_GET['q'])) {

    $query = htmlspecialchars($_GET['q']);

    $conn = new TwitterOAuth(
        'consumerKey',
		'consumerSecret',
        'Access-Token',
        'Token-Secret'
    );

    $tweets = $conn->get("search/tweets", ['q' => $query, 'count' => '10', 'include_entities'=> false, 'lang' => 'en']);

    foreach ($tweets->statuses as $tweet) {
        print_r($tweet->text);
        echo '<br/>';
    }

} else {
    echo 'Empty query';
}

?>
