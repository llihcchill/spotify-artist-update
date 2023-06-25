<?php
  use Symfony\Component\HttpClient\HttpClient;

  $code = $_GET["code"];
  $state = $_GET["state"];
  $client_secret = "CLIENT_SECRET";

  require_once("./controller/login.php");

  if($code === null) {
    return require_once("./view/main.php?");
  } else {
    $form = array(
      "code" => $code,
      "redirect_uri" => "http://localhost:8080/callback.php",
      "grant_type" => "authorization_code"
    );

    $headers = array(
      "Authorization" => "Basic " . base64_encode($client_id . ":" . $client_secret)
    );

    $json = array(
      "json" => true
    );

    $form_json = json_encode($form);
    $headers_json = json_encode($headers);
    $json_json = json_encode($json);

    $authorised = "https://accounts.spotify.com/api/token" .  urlencode($form_json) . urlencode($headers_json) . urlencode($json_json);

    $client = HttpClient::create();
    $request = $client->request(
      "POST",
      $authorised
    );
  }
?>
