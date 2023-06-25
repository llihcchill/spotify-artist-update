<?php
  require_once("./model/functions.php");
  require_once("./controller/login.php");

  $code = $_GET["code"];
  $state = $_GET["state"];
  $client_secret = "CLIENT_SECRET";
  $url = "https://accounts.spotify.com/api/token";

  if($code === null) {
    return require_once("./view/main.php");
  } else {
    $data = array(
      "code" => $code,
      "redirect_uri" => "http://localhost:8080/callback.php",
      "grant_type" => "authorization_code",
      "json" => true
    );

    $header = "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret);

    $req = http_request($data, $header, "POST", $url);
    $decode = json_decode($req);

    $access_token = $decode->access_token;
    $refresh_token = $decode->refresh_token;

    return require_once("./controller/user-playlists.php");
  }
?>
