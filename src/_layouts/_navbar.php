<nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
  <div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
    <a class="navbar-brand" href="./home.php">
      WinGenKey
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $page === "DATABASE" ? "active" : ""; ?>" href="./database.php">
            Database
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page === "KEYS" ? "active" : ""; ?>" href="./keys.php">
            Keys
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page === "VERSIONS" ? "active" : ""; ?>" href="./versions.php">
            Versions
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page === "EDITIONS" ? "active" : ""; ?>" href="./editions.php">
            Editions
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page === "TYPES" ? "active" : ""; ?>" href="./types.php">
            Types
          </a>
        </li>
      </ul>

      <div class="mx-auto"></div>

      <div class="d-lg-flex mt-3 mt-lg-0 mx-0 ms-lg-3">
        <form action="./search.php" method="get">
          <div class="input-group">
            <input type="search" class="form-control" name="searchNavbar" id="searchNavbar" placeholder="Search..." />

            <button type="submit" class="btn btn-primary">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</nav>
