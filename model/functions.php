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
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
      return error_log("HTTP/1.1 request has failed, could not get the results of the request.");
    } else {
      return $result;
    }
  }

  function playlist_filter($item) {
    if ($item->owner->id !== $item->id) {
      return;
    } else {
?>
      <div class="card" style="width: 300px">
        <img class="card-img-top" src="<?php echo $item->images[0]->url; ?>">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $item->name; ?></h5>
        </div>
      </div>
<?php
    }
  }
?>
