<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
    <h2 class="page-title">Add Notes</h2>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Title</label>
                <input type="text" name="title" placeholder="Enter notes title" required>
            </div>

            <div>
                <label>Upload File</label>
                <input type="file" name="file" required>
            </div>

            <div class="full-width">
                <button type="submit" class="btn btn-add">Upload Notes</button>
            </div>
        </form>
    </div>

    <div class="center-btn">
        <a href="<?= BASE_URL ?>notes" class="btn btn-secondary">Back</a>
    </div>
</div>