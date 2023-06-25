<?php
  require_once("./model/functions.php");
  require_once("./callback.php");

  $header = "Authorization: Bearer " . $access_token;
  $data = array();

  $req = http_request($data, $header, "GET", "https://api.spotify.com/v1/me");
?>
