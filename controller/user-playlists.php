<?php
  require_once("../model/functions.php");
  require_once("../callback.php");

  session_start();
  $header = "Authorization: Bearer " . $_SESSION["access_token"];
  $data = array();

  // make an HTTP request to the Spotify API to get the current user to log in
  $user_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $user_playlist_http_request = http_request($data, $header, "GET", "https://api.spotify.com/v1/me/playlists?offset=119");
  $user_playlist_http_request_json = json_decode($user_playlist_http_request);

  // set the item JSON data needed for the playlists and store them in the browser session
  $_SESSION["items"] = $playlist_decode->items;

  header("Location: http://localhost:8080/view/update.php");
  exit();
?>
