<?php
  $title = "License"; // Page Title
  $page = "LICENSE";  // Page Id
?>

<!-- Header -->
<?php include __DIR__ . "/_layouts/_header.php"; ?>
<!-- Navbar -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>

<!--
  BEGIN BANNER
-->
<div class="bg-body-secondary banner py-5 vh-100">
  <div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8">

    <h6 class="fs-6 mt-5">
      <span class="font-monospace">
        <a href="./home.php">Home</a>:
      </span>
    </h6>

    <h3 class="display-3 my-3">
      <span class="fw-bold">
        License
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        WinGenKey
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<div class="container-fluid col-12 col-xs-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-5">
  <div class="card">

    <div class="card-header py-3">
      License
    </div>
    
    <div class="card-body">
      <a href="https://github.com/reallukee/wingenkey/blob/main/LICENSE" target="_blank" class="link-primary">
        MIT
      </a>
    </div>
  
  </div>

  <div class="my-5"></div>

  <div class="card">

    <div class="card-header py-3">
      Third Party Licenses
    </div>

    <div class="list-group list-group-flush">
      <div class="list-group-item py-3">
        <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" class="link-primary">
          Bootstrap
        </a>
      </div>

      <div class="list-group-item py-3">
        <a href="https://github.com/twbs/icons/blob/main/LICENSE" target="_blank" class="link-primary">
          Bootstrap Icons
        </a>
      </div>
    </div>

  </div>
</div>

<!-- Footer -->
<?php include __DIR__ . "/_layouts/_footer.php"; ?>
