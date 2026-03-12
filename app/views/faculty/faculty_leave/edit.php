<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
<h2 class="page-title">Edit Faculty Leave</h2>

<div class="form-card">
<form method="POST">

<div>
<label>Leave Type</label>
<input type="text" name="leave_type"
value="<?= htmlspecialchars($record['leave_type']) ?>" required>
</div>

<div>
<label>From Date</label>
<input type="date" name="from_date"
value="<?= htmlspecialchars($record['from_date']) ?>" required>
</div>

<div>
<label>To Date</label>
<input type="date" name="to_date"
value="<?= htmlspecialchars($record['to_date']) ?>" required>
</div>

<div class="full-width">
<label>Reason</label>
<textarea name="reason"><?= htmlspecialchars($record['reason']) ?></textarea>
</div>

<div class="full-width">
<button type="submit" class="btn btn-edit">Update Leave</button>
</div>

</form>
</div>

<div class="center-btn">
<a href="<?= BASE_URL ?>faculty-leave" class="btn btn-secondary">Back</a>
</div>
</div>