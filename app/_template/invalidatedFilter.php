<div class="card">
  <div class="card-header py-3">
    <div class="row g-3">
      <div class="col-auto">
        Validity
      </div>

      <div class="col"></div>

      <div class="col-auto">
        <?= $invalidated["total"]; ?>
      </div>
    </div>
  </div>

  <div class="list-group list-group-flush">
    <?php if ($verified): ?>
      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="invalidated" value="defaultInvalidate" id="defaultInvalidate" checked />

          <label class="form-check-label" for="defaultInvalidate">
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
          <input class="form-check-input me-1" type="radio" name="invalidated" value="invalidated" id="invalidated" />

          <label class="form-check-label" for="invalidated">
            <i class="bi bi-x-circle-fill text-danger me-1"></i>

            Invalidated
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $invalidated["invalidated"] ?? 0; ?>
        </span>
      </div>
    <?php else: ?>
      <div class="list-group-item list-group-item-info py-3">
        No Invalidated!
      </div>
    <?php endif; ?>
  </div>
</div>
