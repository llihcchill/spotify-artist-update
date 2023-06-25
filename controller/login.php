<?php
  use Symfony\Component\HttpClient\HttpClient;

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
    "scope" => "playlist-read-private playlist-read-public playlist-modify-private playlist-modify-public",
    "redirect_uri" => $redirect_uri,
    "state" => $state
  );

  $url_query = http_build_query($query_array);


  // create an HTTP client to send HTTP requests
  $client = HttpClient::create();
  $request = $client->request(
    "GET",
    $url_query,
    // add header
  );
?>
