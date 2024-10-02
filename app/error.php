<?php
  require_once __DIR__ . "/_common/db.php";  // Database

  $title = "Error";                         // Page Title
  $page = "ERROR";                          // Page Id
?>

<?php include __DIR__ . "/_layouts/_header.php"; ?>  <!-- Header -->
<?php include __DIR__ . "/_layouts/_navbar.php"; ?>  <!-- Navbar -->

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
        Error!
      </span>
    </h3>

    <h6 class="display-6 mb-5">
      <span>
        Error!
      </span>
    </h6>

  </div>
</div>
<!--
  END BANNER
-->

<?php
  $db->close();
?>

<?php include __DIR__ . "/_layouts/_footer.php"; ?>  <!-- Footer -->
