<div class="card">
  <div class="card-header py-3">
    <div class="row g-3">
      <div class="col-auto">
        Reliability
      </div>

      <div class="col"></div>

      <div class="col-auto">
        <?= $verified["total"]; ?>
      </div>
    </div>
  </div>

  <div class="list-group list-group-flush">
    <?php if ($verified): ?>
      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="verified" value="defaultVerified" id="defaultVerified" checked />

          <label class="form-check-label" for="defaultVerified">
            <i class="bi bi-circle-fill me-1"></i>

            Default
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $total["total"]; ?>
        </span>
      </div>

      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="verified" value="verified" id="verified" />

          <label class="form-check-label" for="verified">
            <i class="bi bi-check-circle-fill text-success me-1"></i>

            Verified
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $verified["verified"] ?? 0; ?>
        </span>
      </div>

      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="verified" value="notVerified" id="notVerified" />

          <label class="form-check-label" for="notVerified">
            <i class="bi bi-dash-circle-fill text-warning me-1"></i>

            Not Verified
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $verified["notVerified"] ?? 0; ?>
        </span>
      </div>
    <?php else: ?>
      <div class="list-group-item list-group-item-info py-3">
        No Verified!
      </div>
    <?php endif; ?>
  </div>
</div>
