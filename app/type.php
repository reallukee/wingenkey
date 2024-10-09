<?php
  require_once __DIR__ . "/_controllers/type.php";  // Controller

  $title = "Types";                                 // Page Title
  $page = "TYPES";                                  // Page Id

  $verifiedParam = $_GET["verified"] ?? null;       // ?verified
  $invalidatedParam = $_GET["invalidated"] ?? null; // ?invalidated
  $typeParam = $_GET["type"] ?? null;               // ?type
  $versionParam = $_GET["version"] ?? null;         // ?version
  $editionParam = $_GET["edition"] ?? null;         // ?edition

  // Default Verified
  if ($verifiedParam === "defaultVerified") {
    $verifiedParam = null;
  } else {
    if ($verifiedParam === "verified") {
      $verifiedParam = 1;
    }

    if ($verifiedParam === "notVerified") {
      $verifiedParam = 0;
    }
  }

  // Default Invalidated
  if ($invalidatedParam === "defaultInvalidated") {
    $invalidatedParam = null;
  } else {
    if ($invalidatedParam === "invalidated") {
      $invalidatedParam = 1;
    }

    if ($invalidatedParam === "notInvalidated") {
      $invalidatedParam = 0;
    }
  }

  // Default Version
  if ($versionParam === "defaultVersion") {
    $versionParam = null;
  }

  // Default Edition
  if ($editionParam === "defaultEdition") {
    $editionParam = null;
  }

  $type = type($typeParam);
  $keys = keys($verifiedParam, $invalidatedParam, $versionParam, $editionParam, $typeParam);
  $verified = verified($typeParam);
  $invalidated = invalidated($typeParam);
  $versions = versions($typeParam);
  $editions = editions($typeParam);
  $total = total($typeParam);
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
        <a href="./types.php">Type</a>:
      </span>
    </h6>

    <h3 class="display-3 my-3">
      <span class="fw-bold">
        <?= $type["friendlyName"] ?? "Not Found"; ?>
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        <?= $keys->num_rows; ?> Keys
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
      BEGIN CONTENT
    -->
    <div class="col-12 col-lg-8">
      <div class="card">

        <div class="card-header py-3">
          <div class="row g-3">
            <div class="col-auto">
              Keys
            </div>

            <div class="col"></div>

            <div class="col-auto">
              <?= $keys->num_rows; ?>
            </div>
          </div>
        </div>

        <div class="list-group list-group-flush">
          <?php if ($keys->num_rows > 0): ?>
            <?php while ($row = $keys->fetch_assoc()): ?>
              <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                <span class="me-3">
                  <?php if ($row["verified"]): ?>
                    <?php if ($row["invalidated"]): ?>
                      <i class="bi bi-x-circle-fill text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Invalidated on <?= $row["invalidatedOn"]; ?>"></i>
                    <?php else: ?>
                      <i class="bi bi-check-circle-fill text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Verified on <?= $row["verifiedOn"]; ?>"></i>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php if ($row["invalidated"]): ?>
                      <i class="bi bi-x-circle-fill text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Invalidated on <?= $row["invalidatedOn"]; ?>"></i>
                    <?php else: ?>
                      <i class="bi bi-dash-circle-fill text-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Not Verified"></i>
                    <?php endif; ?>
                  <?php endif; ?>
                </span>

                <div class="me-auto">
                  <p class="m-0 p-0">
                    <?= $row["version"]; ?>

                    <?= $row["edition"]; ?>
                  </p>

                  <p class="m-0 p-0">
                    <?php if ($row["invalidated"]): ?>
                      <code class="text-decoration-line-through text-body-secondary">
                        <?= $row["key"]; ?>
                      </code>
                    <?php else: ?>
                      <code>
                        <?= $row["key"]; ?>
                      </code>
                    <?php endif; ?>
                  </p>
                </div>

                <span class="badge text-bg-primary rounded-pill ms-3">
                  <?= $row["type"]; ?>
                </span>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="list-group-item list-group-item-warning py-3">
              <h4 class="fs-4 m-0 p-0">
                No Keys!
              </h4>

              <div class="my-3"></div>

              <a href="./types.php" class="link-warning">
                Go Back
              </a>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
    <!--
      END CONTENT
    -->

    <!--
      BEGIN SIDEBAR
    -->
    <div class="col-12 col-lg-4">
      <form action="./type.php" method="get">

        <input type="hidden" name="type" id="type" value="<?= $type["name"]; ?>" />

        <?php include __DIR__ . "/_template/verifiedFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/invalidatedFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/editionFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/versionFilter.php"; ?>

        <div class="my-5"></div>

        <div class="row g-3">
          <div class="col">
            <button type="submit" class="btn btn-lg btn-primary w-100">
              Apply
            </button>
          </div>

          <div class="col">
            <a href="./type.php?type=<?= $type["name"]; ?>" role="button" class="btn btn-lg btn-danger w-100">
              Reset
            </a>
          </div>
        </div>

      </form>
    </div>
    <!--
      END SIDEBAR
    -->

  </div>
</div>

<script type="text/javascript">
  const params = new URLSearchParams(window.location.search);

  const verified = params.get("verified") || null;
  const invalidated = params.get("invalidated") || null;

  if (verified) {
    document.querySelector(`#${verified}`).checked = true;
  }

  if (invalidated) {
    document.querySelector(`#${invalidated}`).checked = true;
  }
</script>

<?php $db->close(); ?>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
