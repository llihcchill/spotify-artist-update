<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- using normal bootstrap now-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
  </head>
</html>

<body>
  <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-black" href="/">Artist Update</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-black" aria-current="page" href="/">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row row-cols-6 g-6 mt-5 pt-5 ms-3 me-3">
  <?php
    require_once("../model/functions.php");

    // max number of items being requested from the Spotify API
    $limit = 50;

    for($i = 0; $i <= $_SESSION["playlist_http_requests"]; $i++) {
      $total_playlist_requests = http_request(
        array(),
        $_SESSION["header"],
        "GET",
        "https://api.spotify.com/v1/me/playlists?offset=" . $i*$limit . "&limit=" . $limit
      );
      $total_playlist_requests_json = json_decode($total_playlist_requests);
      foreach($total_playlist_requests_json->items as $_SESSION["item"]) {
        playlist_filter($_SESSION["item"]);
      }
    }
  ?>
  </div>
  
    <style>
      .footer_ {
        position: sticky;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: left;
        margin-top: 24%;
        background-color: white;
      }
    </style>
    <div class="footer_">
      <form action="./update-last.php" id="playlist-form">
        <input type="button"/>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
