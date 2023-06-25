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
?>
