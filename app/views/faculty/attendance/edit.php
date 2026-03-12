<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
<h2 class="page-title">Edit Attendance</h2>

<div class="form-card">
<form method="POST">

<div>
<label>Attendance Date</label>
<input type="date" name="attendance_date"
value="<?= htmlspecialchars($record['attendance_date']) ?>" required>
</div>

<div>
<label>Total Classes</label>
<input type="number" name="total_classes"
value="<?= htmlspecialchars($record['total_classes']) ?>" min="0" required>
</div>

<div>
<label>Attended Classes</label>
<input type="number" name="attended_classes"
value="<?= htmlspecialchars($record['attended_classes']) ?>" min="0" required>
</div>

<div class="full-width">
<button type="submit" class="btn btn-edit">Update Attendance</button>
</div>

</form>
</div>

<div class="center-btn">
<a href="<?= BASE_URL ?>attendance" class="btn btn-secondary">Back</a>
</div>
</div>