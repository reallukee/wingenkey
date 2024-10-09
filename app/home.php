<?php
  require_once __DIR__ . "/_controllers/home.php";  // Controller

  $title = "Home";                                  // Page Title
  $page = "HOME";                                   // Page Id

  $keys = keys();
  $versions = versions();
  $editions = editions();
  $types = types();
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
        WinGenKey
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        <?= $keys["total"]; ?> Keys
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-5">
  <div class="row gx-lg-5 gy-5">

    <!--
      BEGIN DATABASE
    -->
    <div class="col col-lg-12">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              <?= $keys["total"]; ?> Keys
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            Database
          </h6>

          <div class="my-5"></div>

          <a href="./database.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <!--
      END DATABASE
    -->

    <!--
      BEGIN KEYS
    -->
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              <?= $keys["total"]; ?> Keys
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            Keys
          </h6>

          <div class="my-5"></div>

          <a href="./keys.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <!--
      END KEYS
    -->

    <!--
      BEGIN VERSIONS
    -->
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              <?= $versions["total"]; ?> Versions
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            Versions
          </h6>

          <div class="my-5"></div>

          <a href="./versions.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <!--
      END VERSIONS
    -->

    <!--
      BEGIN EDITIONS
    -->
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              <?= $editions["total"]; ?> Editions
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            Editions
          </h6>

          <div class="my-5"></div>

          <a href="./editions.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <!--
      END EDITIONS
    -->

    <!--
      BEGIN TYPES
    -->
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-body p-5">
          <p class="m-0 p-0">
            <span class="badge text-bg-primary">
              <?= $types["total"]; ?> Types
            </span>
          </p>

          <div class="my-3"></div>

          <h6 class="display-6 m-0 p-0">
            Types
          </h6>

          <div class="my-5"></div>

          <a href="./types.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    <!--
      END TYPES
    -->

  </div>
</div>

<?php $db->close(); ?>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
