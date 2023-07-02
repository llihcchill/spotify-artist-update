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
      return error_log("HTTP/1.0 request has failed, could not get the results of the request.");
    } else {
      return $result;
    }
  }

  function playlist_filter(object $item) {
    if ($item->owner->id !== $_SESSION["user_id"]) {
      return;
    } else {
?>
      <div class="col">
        <div class="card mb-3" style="width: 250px">
          <img class="card-img-to" style="height:250px" src="<?php echo $_SESSION["item"]->images[0]->url; ?>">
          <div class="card-body bg-black">
            <p class="card-text text-light" style="overflow-y: scroll; height: 25px"><?php echo $_SESSION["item"]->name; ?></p>
          </div>
        </div>
      </div>
<?php
    }
  }
?>
