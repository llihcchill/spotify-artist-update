<?php
  function http_request(array $data, string $header, string $get_or_post_request, string $url) {
    $options = array(
      "http" => array(
        "header" => $header,
        "method" => $get_or_post_request,
        "content" => http_build_query($data)
      )
    );
    
    $context = stream_context_create($options);
    global $result;
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
      return error_log("HTTP/1.1 request has failed, as it could not get the results of the request.");
    }
  }

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

    http_request(
      $data,
      "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret),
      "POST",
      $url
    );
    $decode = json_decode($result);

    echo $result;
    echo "<br>";
    echo "this is your access token: " . $decode->access_token;
  }
?>
