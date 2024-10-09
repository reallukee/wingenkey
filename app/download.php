<?php
  $title = "Download";  // Page Title
  $page = "DOWNLOAD";   // Page Id
?>

<!-- Header -->
<?php include __DIR__ . "/_layouts/_header.php"; ?>
<!-- Navbar -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>

<!--
  BEGIN BANNER
-->
<div class="bg-body-secondary banner py-5">
  <div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8">

    <h6 class="fs-6 mt-5">
      <span class="font-monospace">
        <a href="./home.php">Home</a>:
      </span>
    </h6>

    <h3 class="display-3 my-3">
      <span class="fw-bold">
        Download
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        3 Files
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-5">

  <div class="alert alert-primary" role="alert">
    Last Update on 2024-10-01 14:00:00
  </div>

  <div class="my-5"></div>

  <div class="row row-cols-1 row-cols-lg-3 gx-lg-5 gy-5">

    <!--
      BEGIN CSV
    -->
    <div class="col">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              Latest
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            CSV
          </h6>

          <div class="my-5"></div>

          <a href="./public/latest.csv" role="button" class="btn btn-lg btn-outline-secondary" download>
            Download <i class="bi bi-download ms-1"></i>
          </a>
        </div>

        <div class="list-group list-group-flush">
          <?php foreach (glob("./public/*.csv") as $file): ?>
            <div class="list-group-item py-3">
              <a href="./public/<?= $file; ?>" class="link-primary" download>
                <?= pathinfo($file, PATHINFO_FILENAME); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!--
      END CSV
    -->

    <!--
      BEGIN JSON
    -->
    <div class="col">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              Latest
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            JSON
          </h6>

          <div class="my-5"></div>

          <a href="./public/latest.json" role="button" class="btn btn-lg btn-outline-secondary" download>
            Download <i class="bi bi-download ms-1"></i>
          </a>
        </div>

        <div class="list-group list-group-flush">
          <?php foreach (glob("./public/*.json") as $file): ?>
            <div class="list-group-item py-3">
              <a href="./public/<?= $file; ?>" class="link-primary" download>
                <?= pathinfo($file, PATHINFO_FILENAME); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!--
      END JSON
    -->

    <!--
      BEGIN XML
    -->
    <div class="col">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              Latest
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            XML
          </h6>

          <div class="my-5"></div>

          <a href="./public/latest.xml" role="button" class="btn btn-lg btn-outline-secondary" download>
            Download <i class="bi bi-download ms-1"></i>
          </a>
        </div>

        <div class="list-group list-group-flush">
          <?php foreach (glob("./public/*.xml") as $file): ?>
            <div class="list-group-item py-3">
              <a href="./public/<?= $file; ?>" class="link-primary" download>
                <?= pathinfo($file, PATHINFO_FILENAME); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!--
      END XML
    -->

  </div>

</div>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
