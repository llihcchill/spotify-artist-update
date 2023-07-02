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
      foreach ($_SESSION["items"] as $_SESSION["item"]) {
        if ($_SESSION["item"]->owner->id !== $_SESSION["spotify_id"]) {
          break;
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
          // closes the foreach loop, take note, very interesting
        }
      }
    ?>
  </div>

  <!-- footer (use footer class) -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
