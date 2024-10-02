<?php
  require_once __DIR__ . "/_common/db.php";    // Database

  $title = "Versions";                        // Page Title
  $page = "VERSIONS";                         // Page Id

  $search = $_GET["search"] ?? "";            // ?search
?>

<?php include __DIR__ . "/_layouts/_header.php"; ?>  <!-- Header -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>  <!-- Navbar -->

<?php
  // Versions
  $sql =
   "SELECT
      COUNT(v.name) AS total
    FROM
      version v
    WHERE
      v.name LIKE ?
    OR
      v.friendlyName LIKE ?";

  $searchParam = "%" . $search . "%";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("ss", $searchParam, $searchParam);
  $stmt->execute();

  $versions = $stmt->get_result();
  $total = $versions->fetch_assoc();

  $stmt->close();

  // Total
  $sql =
    "SELECT
      v.*,
      COUNT(k.key) AS total
    FROM
      version v
    LEFT JOIN
      `key` k ON k.version=v.name
    WHERE
      v.name LIKE ?
    OR
      v.friendlyName LIKE ?
    GROUP BY
      v.name
    ORDER BY
      total DESC";

  $searchParam = "%" . $search . "%";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("ss", $searchParam, $searchParam);
  $stmt->execute();

  $versions = $stmt->get_result();

  $stmt->close();
?>

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
        Versions
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        <?= $total["total"]; ?> Versions
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
  <form action="./versions.php" method="get">

    <div class="row g-3">
      <div class="col">
        <input type="search" class="form-control form-control-lg" name="search" id="search" placeholder="Search..." />
      </div>

      <div class="col-auto">
        <button type="submit" class="btn btn-lg btn-primary">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>

  </form>
  <!--
    END SEARCH
  -->

  <div class="my-5"></div>

  <?php if ($versions->num_rows > 0): ?>
    <div class="row row-cols-1 row-cols-lg-3 gx-lg-5 gy-5">
      <?php while ($row = $versions->fetch_assoc()): ?>
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

              <a href="./version.php?version=<?= $row["name"]; ?>" role="button" class="btn btn-outline-secondary">
                View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
              </a>

            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-info">
      No Versions!
    </div>
  <?php endif; ?>
</div>

<script type="text/javascript">
  const params = new URLSearchParams(window.location.search);

  const search = params.get("search") || null;

  document.querySelector("#search").value = search;
</script>

<?php
  $db->close();
?>

<?php include __DIR__ . "/_layouts/_footer.php"; ?>  <!-- Footer -->
