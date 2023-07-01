<?php
  require_once("../model/functions.php");
  require_once("../callback.php");

  session_start();
  $header = "Authorization: Bearer " . $_SESSION["access_token"];
  $data = array();

  // make an HTTP request to the Spotify API to get the current user's Spotify ID
  $user_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");
  $decode = json_decode($user_req);

  $_SESSION["spotify_id"] = $decode->id;

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $playlist_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/users/" . $spotify_id . "/playlists");
  $playlist_decode = json_decode($playlist_req);

  // set all the JSON data needed for the playlist and store them in the browser session
  $_SESSION["item"] = $playlist_decode->items;
  $_SESSION["owner_id"] = $playlist_decode->items[0]->owner->id;
  $_SESSION["item_id"] = $playlist_decode->items[0]->id;
  $_SESSION["playlist_name"] = $playlist_decode->items[0]->name;
  $_SESSION["image"] = $playlist_decode->items[0]->images[0]->url;

  header("Location: http://localhost:8080/view/update.php");
  exit();
?>
