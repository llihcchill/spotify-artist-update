<?php
  // set the client ID and redirect URI to process if the Spotify login was a success
  $client_id = "CLIENT_ID";
  $redirect_uri = "http://localhost:8080/callback";

  // to protect against certain attacks, a random alpha-numeric hash will be created and put as a state
  $random_number = rand();
  $state = md5($random_number);

  // this array will be turned into a URL for the Spotify login
  $query_array = array(
    "response_type" => "code",
    "client_id" => $client_id,
    "scope" => "playlist-read-private playlist-modify-private",
    "redirect_uri" => $redirect_uri,
    "state" => $state
  );

  $url_query = http_build_query($query_array);
?>
