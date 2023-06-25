<?php
  require_once("./model/functions.php");

  $code = $_GET["code"];
  $state = $_GET["state"];
  $client_secret = "CLIENT_SECRET";
  $url = "https://accounts.spotify.com/api/token";

  require_once("./controller/login.php");

  if($code === null) {
    return require_once("./view/main.php");
  } else {
    $data = array(
      "code" => $code,
      "redirect_uri" => "http://localhost:8080/callback.php",
      "grant_type" => "authorization_code",
      "json" => true
    );

    http_request($data,
      "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret),
      "POST", $url
    );
    $decode = json_decode($result);

    $access_token = $decode->access_token;
    $refresh_token = $decode->refresh_token;
  }
?>
