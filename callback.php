<?php
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

    $options = array(
      "http" => array(
        "header" => "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret),
        "method" => "POST",
        "content" => http_build_query($data)
      )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    if ($result === FALSE) {
      echo "not good";
    }

    var_dump($result);
  }
?>
