<?php
  require_once __DIR__ . "/_common/db.php";          // Database

  $title = "Versions";                              // Page Title
  $page = "VERSIONS";                               // Page Id

  $verifiedParam = $_GET["verified"] ?? null;       // ?verified
  $invalidatedParam = $_GET["invalidated"] ?? null; // ?invalidated
  $versionParam = $_GET["version"] ?? null;         // ?version
  $editionParam = $_GET["edition"] ?? null;         // ?edition
  $typeParam = $_GET["type"] ?? null;               // ?type

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

  // Default Edition
  if ($editionParam === "defaultEdition") {
    $editionParam = null;
  }

  // Default Type
  if ($typeParam === "defaultType") {
    $typeParam = null;
  }
?>

<?php include __DIR__ . "/_layouts/_header.php"; ?>  <!-- Header -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>  <!-- Navbar -->

<?php
  // Version
  $sql =
    "SELECT
      v.*
    FROM
      version v
    WHERE
      v.name=?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $result = $stmt->get_result();
  $version = $result->fetch_assoc();

  $stmt->close();

  // Keys
  $sql =
    "SELECT
      k.*,
      v.friendlyName AS version,
      e.friendlyName AS edition,
      t.friendlyName AS type
    FROM
      `key` k
    JOIN
      version v ON v.name=k.version
    JOIN
      edition e ON e.name=k.edition
    JOIN
      type t ON t.name=k.type
    WHERE
      k.version=?
    AND
      (
        k.verified=?
      OR
        ? IS NULL
      )
    AND
      (
        k.invalidated=?
      OR
        ? IS NULL
      )
    AND
      (
        k.edition=?
      OR
        ? IS NULL
      )
    AND
      (
        k.type=?
      OR
        ? IS NULL
      )";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("siiiissss", $versionParam, $verifiedParam, $verifiedParam, $invalidatedParam, $invalidatedParam, $editionParam, $editionParam, $typeParam, $typeParam);
  $stmt->execute();

  $keys = $stmt->get_result();

  $stmt->close();

  // Verified
  $sql =
    "SELECT DISTINCT
      COUNT(k.verified) AS total,
      SUM(CASE WHEN k.verified=0 THEN 1 ELSE 0 END) AS notVerified,
      SUM(CASE WHEN k.verified=1 THEN 1 ELSE 0 END) AS verified
    FROM
      `key` k
    WHERE
      k.version=?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $result = $stmt->get_result();
  $verified = $result->fetch_assoc();

  $stmt->close();

  // Invalidated
  $sql =
    "SELECT DISTINCT
      COUNT(k.invalidated) AS total,
      SUM(CASE WHEN k.invalidated=0 THEN 1 ELSE 0 END) AS notInvalidated,
      SUM(CASE WHEN k.invalidated=1 THEN 1 ELSE 0 END) AS invalidated
    FROM
      `key` k
    WHERE
      k.version=?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $result = $stmt->get_result();
  $invalidated = $result->fetch_assoc();

  $stmt->close();

  // Editions
  $sql =
    "SELECT DISTINCT
      e.name,
      e.friendlyName,
      COUNT(k.edition) AS total
    FROM
      `key` k
    JOIN
      edition e ON e.name=k.edition
    WHERE
      k.version=?
    GROUP BY
      e.name,
      e.friendlyName
    ORDER BY
      total DESC";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $editions = $stmt->get_result();

  $stmt->close();

  // Types
  $sql =
    "SELECT DISTINCT
      t.name,
      t.friendlyName,
      COUNT(k.type) AS total
    FROM
      `key` k
    JOIN
      type t ON t.name=k.type
    WHERE
      k.version=?
    GROUP BY
      t.name,
      t.friendlyName
    ORDER BY
      total DESC";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $types = $stmt->get_result();

  $stmt->close();

  // Total
  $sql =
    "SELECT
      COUNT(k.key) AS total
    FROM
      `key` k
    WHERE
      k.version=?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $versionParam);
  $stmt->execute();

  $result = $stmt->get_result();
  $total = $result->fetch_assoc();

  $stmt->close();
?>

<!--
  BEGIN BANNER
-->
<div class="bg-body-secondary banner py-5">
  <div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8">

    <h6 class="fs-6 mt-5">
      <span class="font-monospace">
        <a href="./versions.php">Version</a>:
      </span>
    </h6>

    <h3 class="display-3 my-3">
      <span class="fw-bold">
        <?= $version["friendlyName"] ?? "Not Found"; ?>
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
      BEGIN SIDEBAR
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
            <div class="list-group-item list-group-item-info py-3">
              No Keys!
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
    <!--
      END SIDEBAR
    -->

    <!--
      BEGIN CONTENT
    -->
    <div class="col-12 col-lg-4">
      <form action="./version.php" method="get">

        <input type="hidden" name="version" id="version" value="<?= $version["name"]; ?>" />

        <?php include __DIR__ . "/_template/verifiedFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/invalidatedFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/editionFilter.php"; ?>

        <div class="my-5"></div>

        <?php include __DIR__ . "/_template/typeFilter.php"; ?>

        <div class="my-5"></div>

        <div class="row g-3">
          <div class="col">
            <button type="submit" class="btn btn-lg btn-primary w-100">
              Apply
            </button>
          </div>

          <div class="col">
            <a href="./version.php?version=<?= $version["name"]; ?>" role="button" class="btn btn-lg btn-danger w-100">
              Reset
            </a>
          </div>
        </div>

      </form>
    </div>
    <!--
      END CONTENT
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

<?php
  $db->close();
?>

<?php include __DIR__ . "/_layouts/_footer.php"; ?>  <!-- Footer -->
