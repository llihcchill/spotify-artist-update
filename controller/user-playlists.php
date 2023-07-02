<?php
  require_once("../model/functions.php");
  require_once("../callback.php");

  session_start();
  $header = "Authorization: Bearer " . $_SESSION["access_token"];

  // make an HTTP request to the Spotify API to get the current user to log in
  $user_req = http_request(array(), $header, "GET", "https://api.spotify.com/v1/me");
  $user_id_json = json_decode($user_req);
  $_SESSION["user_id"] = $user_id_json->id;

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $user_playlist_http_request = http_request(array(), $header, "GET", "https://api.spotify.com/v1/me/playlists");
  $user_playlist_http_request_json = json_decode($user_playlist_http_request);

  // set the item JSON data needed for the playlists and store them in the browser session
  $_SESSION["playlist_http_requests"] = ceil($user_playlist_http_request_json->total / 50);

  header("Location: http://localhost:8080/view/update.php");
  exit();
?>
