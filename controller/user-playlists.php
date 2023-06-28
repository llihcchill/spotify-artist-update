<?php
  require_once("../model/functions.php");
  require_once("../callback.php");

  $header = "Authorization: Bearer " . $_SESSION["access_token"];
  $data = array();

  // make an HTTP request to the Spotify API to get the current user's Spotify ID
  $user_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");
  $decode = json_decode($user_req);

  $spotify_id = $decode->id;

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $playlist_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/users/" . $spotify_id . "/playlists");
  $playlist_decode = json_decode($playlist_req);

  session_start();
  $_SESSION["item"] = $playlist_decode->item;
  $_SESSION["owner_id"] = $i->owner->id;
  // add more variables, debug whatever $i is first

  header("Location: http://localhost:8080/view/update.php");
  exit();
?>
