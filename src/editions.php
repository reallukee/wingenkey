<?php
  require_once __DIR__ . "/_controllers/editions.php";  // Controller

  $title = "Editions";                                  // Page Title
  $page = "EDITIONS";                                   // Page Id

  $searchParam = $_GET["search"] ?? null;               // ?search
  $sortParam = $_GET["sort"] ?? "up";                   // ?sort

  $total = total($searchParam);
  $editions = editions($searchParam, $sortParam);

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Create
    if (isset($_POST["create"])) {
      $name = $_POST["name"];
      $friendlyName = $_POST["friendlyName"];

      create($name, $friendlyName);
    }

    // Edit
    if (isset($_POST["edit"])) {
      $name = $_POST["name"];
      $friendlyName = $_POST["friendlyName"];

      update($name, $friendlyName);
    }

    // Remove
    if (isset($_POST["remove"])) {
      $name = $_POST["name"];

      remove($name);
    }

    // Redirect
    header("location: ./editions.php?search=" . $_POST["search"] . "&sort=" . $_POST["sort"]);
  }
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

    <div class="row g-3">
      <?php if ($MODE === "edit"): ?>
        <div class="col-12 col-lg-auto">
          <button type="button" class="btn  btn-lg btn-primary w-100" data-bs-toggle="modal" data-bs-target="#create">
            Create <i class="bi bi-plus-circle-fill ms-1"></i>
          </button>
        </div>
      <?php endif; ?>

      <div class="col-12 col-lg">
        <input type="search" class="form-control form-control-lg" name="search" id="search" placeholder="Search..." />
      </div>

      <div class="col col-lg-auto">
        <div class="btn-group btn-group-lg w-100" role="group">
          <input type="radio" class="btn-check" name="sort" id="up" value="up" autocomplete="off" checked />

          <label class="btn btn-outline-primary" for="up">
            <i class="bi bi-sort-numeric-down"></i>
          </label>

          <input type="radio" class="btn-check" name="sort" id="down" value="down" autocomplete="off" />

          <label class="btn btn-outline-primary" for="down">
            <i class="bi bi-sort-numeric-down-alt"></i>
          </label>
        </div>
      </div>

      <div class="col col-lg-auto">
        <button type="submit" class="btn btn-lg btn-primary w-100">
          <i class="bi bi-search"></i>
        </button>
      </div>
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

              <div class="row g-3">
                <div class="col-auto">
                  <a href="./edition.php?edition=<?= $row["name"]; ?>" role="button" class="btn btn-outline-secondary">
                    View <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                  </a>
                </div>

                <?php if ($MODE === "edit"): ?>
                  <div class="col-auto">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit" data-bs-name="<?= $row["name"]; ?>" data-bs-friendlyName="<?= $row["friendlyName"]; ?>">
                      Edit <i class="bi bi-pencil-square ms-1"></i>
                    </button>
                  </div>

                  <div class="col-auto">
                    <form action="./editions.php" method="post" class="mb-0">
                      <input type="text" name="remove" hidden />
                      <input type="text" name="name" value="<?= $row["name"]; ?>" hidden />

                      <button type="button" class="btn btn-outline-danger" name="remove">
                        Delete <i class="bi bi-trash-fill ms-1"></i>
                      </button>
                    </form>
                  </div>
                <?php endif; ?>
              </div>

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

<!--
  BEGIN CREATE MODAL
-->
<form action="./editions.php" method="post">
  <div class="modal fade" id="create" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4">
            Create Edition
          </h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="text" name="search" id="createSearch" hidden />

          <input type="text" name="sort" id="createSort" hidden />

          <label for="name" class="form-label">
            Name
          </label>

          <input type="text" class="form-control" name="name" id="name" placeholder="generic" />

          <div class="my-3"></div>

          <label for="friendlyName" class="form-label">
            Friendly Name
          </label>

          <input type="text" class="form-control" name="friendlyName" id="friendlyName" placeholder="Generic" />
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>

          <button type="submit" class="btn btn-primary ms-2" name="create">
            Create
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<!--
  END CREATE MODAL
-->

<!--
  BEGIN EDIT MODAL
-->
<form action="./editions.php" method="post">
  <div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4">
            Edit Edition
          </h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="text" name="search" id="editSearch" hidden />

          <input type="text" name="sort" id="editSort" hidden />

          <input type="text" name="name" id="name" hidden />

          <label for="friendlyName" class="form-label">
            Friendly Name
          </label>

          <input type="text" class="form-control" name="friendlyName" id="friendlyName" />
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>

          <button type="submit" class="btn btn-primary ms-2" name="edit">
            Edit
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<!--
  END EDIT MODAL
-->

<script type="text/javascript">
  const params = new URLSearchParams(window.location.search);

  const search = params.get("search") || null;
  const sort = params.get("sort") || null;

  document.querySelector("#search").value = search;

  if (sort === "up") {
    document.querySelector("#up").checked = true;
  } else if (sort === "down") {
    document.querySelector("#down").checked = true;
  } else {
    document.querySelector("#up").checked = true;
  }

  document.getElementsByName("remove").forEach((remove) => {
    remove.addEventListener("click", (event) => {
      const form = event.target.parentNode;

      const search = document.createElement("input");
      search.type = "text";
      search.name = "search"
      search.value = document.querySelector("#search").value;
      search.hidden = true;

      const sort = document.createElement("input");
      sort.type = "text";
      sort.name = "sort"
      sort.value = document.querySelector("#up").checked ? "up" : "down";
      sort.hidden = true;

      form.appendChild(search);
      form.appendChild(sort);

      form.submit();
    });
  });

  const create =document.getElementById("create");

  if (create) {
    create.addEventListener("show.bs.modal", (event) => {
      const button = event.relatedTarget

      create.querySelector("#createSearch").value = document.querySelector("#search").value;
      create.querySelector("#createSort").value = document.querySelector("#up").checked ? "up" : "down";
    });
  }

  const edit = document.getElementById("edit");

  if (edit) {
    edit.addEventListener("show.bs.modal", (event) => {
      const button = event.relatedTarget

      const name = button.getAttribute("data-bs-name");
      const friendlyName = button.getAttribute("data-bs-friendlyName");

      edit.querySelector("#name").value = name;
      edit.querySelector("#friendlyName").value = friendlyName;

      edit.querySelector("#editSearch").value = document.querySelector("#search").value;
      edit.querySelector("#editSort").value = document.querySelector("#up").checked ? "up" : "down";
    });
  }
</script>

<?php $db->close(); ?>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
