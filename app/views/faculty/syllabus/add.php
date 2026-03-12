<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
    <h2 class="page-title">Add Syllabus</h2>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">
            <div class="full-width">
                <label>Upload File</label>
                <input type="file" name="file" required>
            </div>

            <div class="full-width">
                <button type="submit" class="btn btn-add">Upload Syllabus</button>
            </div>
        </form>
    </div>

    <div class="center-btn">
        <a href="<?= BASE_URL ?>syllabus" class="btn btn-secondary">Back</a>
    </div>
</div>