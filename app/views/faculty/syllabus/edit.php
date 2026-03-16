<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
<h2 class="page-title">Edit Syllabus</h2>

<div class="form-card">
<form method="POST" enctype="multipart/form-data">

<div class="full-width">
<label>Upload New File</label>
<input type="file" name="file">
<?php if (!empty($record['file_path'])): ?>
    <p>
        Current File:
        <a href="/college/public/uploads/syllabus/<?= htmlspecialchars($record['file_path']) ?>" target="_blank">
            <?= htmlspecialchars($record['file_path']) ?>
        </a>
    </p>
<?php endif; ?>
</div>

<div class="full-width">
<button type="submit" class="btn btn-edit">Update Syllabus</button>
</div>

</form>
</div>

<div class="center-btn">
<a href="<?= BASE_URL ?>syllabus" class="btn btn-secondary">Back</a>
</div>
</div>