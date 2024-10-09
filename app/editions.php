<?php
  require_once __DIR__ . "/_controllers/editions.php";  // Controller

  $title = "Editions";                                  // Page Title
  $page = "EDITIONS";                                   // Page Id

  $searchParam = $_GET["search"] ?? null;               // ?search

  $total = total($searchParam);
  $editions = editions($searchParam);
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
        <a href="./home.php">WinGenKey</a>:
      </span>
    </h6>

    <h3 class="display-3 my-3">
      <span class="fw-bold">
        Editions
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        <?= $total["total"]; ?> Editions
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-5">

  <!--
    BEGIN SEARCH
  -->
  <form action="./editions.php" method="get">

    <div class="input-group input-group-lg">
      <input type="search" class="form-control form-control-lg" name="search" id="search" placeholder="Search..." />

      <button type="submit" class="btn btn-lg btn-primary">
        <i class="bi bi-search"></i>
      </button>
    </div>

  </form>
  <!--
    END SEARCH
  -->

  <div class="my-5"></div>

  <!--
    BEGIN EDITIONS
  -->
  <?php if ($editions->num_rows > 0): ?>
    <div class="row row-cols-1 row-cols-lg-3 gx-lg-5 gy-5">
      <?php while ($row = $editions->fetch_assoc()): ?>
        <div class="col">
          <div class="card">
            <div class="card-body">

              <p class="m-0 p-0">
                <span class="badge text-bg-primary">
                  <?= $row["total"]; ?> Keys
                </span>
              </p>

              <div class="my-3"></div>

              <h4 class="fs-4 m-0 p-0">
                <?= $row["friendlyName"]; ?>
              </h4>

              <p class="m-0 p-0">
                <code class="m-0 p-0">
                  <?= $row["name"]; ?>
                </code>
              </p>

              <div class="my-5"></div>

              <a href="./edition.php?edition=<?= $row["name"]; ?>" role="button" class="btn btn-outline-secondary">
                View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
              </a>

            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-warning py-3" role="alert">
      <h4 class="fs-4 m-0 p-0">
        No Editions!
      </h4>

      <div class="my-3"></div>

      <a href="./editions.php" class="link-warning">
        Reset Parameters
      </a>
    </div>
  <?php endif; ?>
  <!--
    END EDITIONS
  -->

</div>

<script type="text/javascript">
  const params = new URLSearchParams(window.location.search);

  const search = params.get("search") || null;

  document.querySelector("#search").value = search;
</script>

<?php $db->close(); ?>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
