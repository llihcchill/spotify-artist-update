<?php
  require_once("../model/functions.php");
  require_once("../callback.php");

  session_start();
  $header = "Authorization: Bearer " . $_SESSION["access_token"];
  $data = array();

  // make an HTTP request to the Spotify API to get the current user's Spotify ID
  $user_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");
  $decode = json_decode($user_req);

  $spotify_id = $decode->id;

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $playlist_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/users/" . $spotify_id . "/playlists");
  $playlist_decode = json_decode($playlist_req);

  $_SESSION["item"] = $playlist_decode->item;
  $_SESSION["owner_id"] = $playlist_decode->owner->id;
  $_SESSION["item_id"] = $playlist_decode->id;
  $_SESSION["playlist_name"] = $playlist_decode->name;
  $_SESSION["image"] = $playlist_decode->images->url;


  header("Location: http://localhost:8080/view/update.php");
  exit();
?>
