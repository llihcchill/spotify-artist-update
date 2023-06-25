<?php
  use Symfony\Component\HttpClient\HttpClient;

  $url_query = "example";

  // create an HTTP client to send HTTP requests
  $client = HttpClient::create();
  $request = $client->request(
    "GET",
    $url_query,
    // add header
  );
?>
