<?php
  require_once("./model/functions.php");
  require_once("./callback.php");

  $header = "Authorization: Bearer " . $access_token;
  $data = array();
  $playlist_req_data = array(
    "limit" => 50,
  );

  // make an HTTP request to the Spotify API to get the current user's Spotify ID
  $user_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");
  $decode = json_decode($user_req);

  $spotify_id = $decode->id;

  // make an HTTP request to the Spotify API to get all of the current user's playlists
  $playlist_req = http_request($data, $header, "GET", "https://api.spotify.com/v1/users/" . $spotify_id . "/playlists");
  $playlist_decode = json_decode($playlist_req);

  $item = $playlist_decode->item;
  $owner_id = $i->owner->id;
?>
