<?php
  require_once __DIR__ . "/_common/db.php";  // Database

  $title = "Home";                          // Page Title
  $page = "HOME";                           // Page Id
?>

<?php include __DIR__ . "/_layouts/_header.php"; ?>  <!-- Header -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>  <!-- Navbar -->

<?php
  // Key Total
  $sql =
    "SELECT
      COUNT(k.key) AS total
    FROM
      `key` k";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result();
  $keys = $result->fetch_assoc();

  $stmt->close();

  // Version Total
  $sql =
    "SELECT
      COUNT(v.name) AS total
    FROM
      version v";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result();
  $versions = $result->fetch_assoc();

  $stmt->close();

  // Edition Total
  $sql =
    "SELECT
      COUNT(e.name) AS total
    FROM
      edition e";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result();
  $editions = $result->fetch_assoc();

  $stmt->close();

  // Type Total
  $sql =
    "SELECT
      COUNT(t.name) AS total
    FROM
      type t";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result();
  $types = $result->fetch_assoc();

  $stmt->close();
?>

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
      Search
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
            Search
          </h6>

          <div class="my-5"></div>

          <a href="./search.php" role="button" class="btn btn-lg btn-outline-secondary">
            View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
          </a>
        </div>
      </div>
    </div>

    <!--
      Versions
    -->
    <div class="col col-lg-4">
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
      Editions
    -->
    <div class="col col-lg-4">
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
      Types
    -->
    <div class="col col-lg-4">
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

  </div>
</div>

<?php
  $db->close();
?>

<?php include __DIR__ . "/_layouts/_footer.php"; ?>  <!-- Footer -->
