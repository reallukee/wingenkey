<div class="card">
  <div class="card-header py-3">
    <div class="row g-3">
      <div class="col-auto">
        Editions
      </div>

      <div class="col"></div>

      <div class="col-auto">
        <?= $editions->num_rows; ?>
      </div>
    </div>
  </div>

  <div class="list-group list-group-flush">
    <?php if ($editions->num_rows > 0): ?>
      <div class="list-group-item d-flex justify-content-between align-items-center py-3">
        <div class="me-auto">
          <input class="form-check-input me-1" type="radio" name="edition" value="defaultEdition" id="defaultEdition" checked />

          <label class="form-check-label" for="defaultEdition">
            Default
          </label>
        </div>

        <span class="badge text-bg-primary rounded-pill">
          <?= $total["total"]; ?>
        </span>
      </div>

      <?php while ($row = $editions->fetch_assoc()): ?>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div class="me-auto">
            <input class="form-check-input me-1" type="radio" name="edition" value="<?= $row["name"]; ?>" id="<?= $row["name"]; ?>" <?= $editionParam === $row["name"] ? "checked" : ""; ?> />

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
        No Editions!
      </div>
    <?php endif; ?>
  </div>
</div>
