<div class="card">
  <div class="card-header py-3">
    <div class="row g-3">
      <div class="col-auto">
        Types
      </div>

      <div class="col"></div>

      <div class="col-auto">
        <?= $types->num_rows; ?>
      </div>
    </div>
  </div>

  <div class="list-group list-group-flush">
    <?php if ($types->num_rows > 0): ?>
      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="type" value="defaultType" id="defaultType" checked />

          <label class="form-check-label" for="defaultType">
            Default
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $total["total"]; ?>
        </span>
      </div>

      <?php while ($row = $types->fetch_assoc()): ?>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div class="me-auto">
            <input class="form-check-input me-1" type="radio" name="type" value="<?= $row["name"]; ?>" id="<?= $row["name"]; ?>" <?= $typeParam === $row["name"] ? "checked" : ""; ?> />

            <label class="form-check-label" for="<?= $row["name"]; ?>">
              <?= $row["friendlyName"]; ?>
            </label>
          </div>

          <span class="badge text-bg-primary rounded-pill">
            <?= $row["total"]; ?>
          </span>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="list-group-item list-group-item-info py-3">
        No Types!
      </div>
    <?php endif; ?>
  </div>
</div>
