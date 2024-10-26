<?php
  require_once __DIR__ . "/_controllers/sitemap.php"; // Controllers

  $title = "Sitemap";                               // Page Title
  $page = "SITEMAP";                                // Page Id

  $total = total();
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
        Sitemap
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        <?= $total["total"]; ?> Links
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-5">
  <div class="row gx-lg-5 gy-5">

    <div class="col-12 col-lg-6">
      <h4>
        Primary
      </h4>

      <ul class="nav flex-column">
        <li class="nav-item my-1">
          <a href="./home.php" class="nav-link p-0">
            Home
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./database.php" class="nav-link p-0">
            Database
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./keys.php" class="nav-link p-0">
            Keys
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./versions.php" class="nav-link p-0">
            Versions
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./editions.php" class="nav-link p-0">
            Editions
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./types.php" class="nav-link p-0">
            Types
          </a>
        </li>
      </ul>
    </div>

    <div class="col-12 col-lg-6">
      <h4>
        Secondary
      </h4>

      <ul class="nav flex-column">
        <li class="nav-item my-1">
          <a href="./about.php" class="nav-link p-0">
            About
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./license.php" class="nav-link p-0">
            License
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./download.php" class="nav-link p-0">
            Download
          </a>
        </li>

        <li class="nav-item my-1">
          <a href="./sitemap.php" class="nav-link p-0">
            Sitemap
          </a>
        </li>
      </ul>
    </div>

    <!--
      BEGIN KEYS
    -->
    <div class="col-12 col-lg-6">
      <h4>
        Keys
      </h4>

      <ul class="nav flex-column">
        <?php while ($row = $keys->fetch_assoc()): ?>
          <li class="nav-item my-1">
            <a href="./key.php?key=<?= $row["key"]; ?>" class="nav-link p-0">
              <code>
                <?= $row["key"]; ?>
              </code>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <!--
      END KEYS
    -->

    <!--
      BEGIN VERSIONS
    -->
    <div class="col-12 col-lg-6">
      <h4>
        Versions
      </h4>

      <ul class="nav flex-column">
        <?php while ($row = $versions->fetch_assoc()): ?>
          <li class="nav-item my-1">
            <a href="./version.php?version=<?= $row["name"]; ?>" class="nav-link p-0">
              <?= $row["friendlyName"]; ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <!--
      END VERSIONS
    -->

    <!--
      BEGIN EDITIONS
    -->
    <div class="col-12 col-lg-6">
      <h4>
        Editions
      </h4>

      <ul class="nav flex-column">
        <?php while ($row = $editions->fetch_assoc()): ?>
          <li class="nav-item my-1">
            <a href="./edition.php?edition=<?= $row["name"]; ?>" class="nav-link p-0">
              <?= $row["friendlyName"]; ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <!--
      END EDITIONS
    -->

    <!--
      BEGIN TYPES
    -->
    <div class="col-12 col-lg-6">
      <h4>
        Types
      </h4>

      <ul class="nav flex-column">
        <?php while ($row = $types->fetch_assoc()): ?>
          <li class="nav-item my-1">
            <a href="./type.php?type=<?= $row["name"]; ?>" class="nav-link p-0">
              <?= $row["friendlyName"]; ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <!--
      END TYPES
    -->

  </div>
</div>

<?php $db->close(); ?>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
