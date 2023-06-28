<?php
  require_once(realpath(dirname(__FILE__) . "/model/functions.php"));
  require_once(realpath(dirname(__FILE__) . "/controller/login.php"));

  $code = $_GET["code"];
  $state = $_GET["state"];
  $client_secret = /* MAKE SURE TO GET RID OF THIS ###########*/ "6c96d31faa3644d18ae4bf23bfa5bf62";
  $url = "https://accounts.spotify.com/api/token";

  if($code === null) {
    return require_once(realpath(dirname(__FILE__)) . "/view/main.php");
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

    session_start();
    $_SESSION["access_token"] = $decode->access_token;
    $_SESSION["refresh_token"] = $decode->refresh_token;

    header("Location: http://localhost:8080/controller/user-playlists.php");
    exit();
  }
?>
