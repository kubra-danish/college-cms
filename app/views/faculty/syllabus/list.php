<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<h2 class="page-title">Syllabus</h2>

<div class="table-wrapper">

<div class="top-bar">
<a href="<?= BASE_URL ?>syllabus-add" class="btn btn-add">
Upload Syllabus
</a>
</div>

<table class="table">

<tr>
<th>ID</th>
<th>Subject</th>
<th>File</th>
<th>Actions</th>
</tr>

<?php if (!empty($records)) { ?>
    <?php foreach ($records as $row) { ?>
        <tr>
            <td><?= $row['syllabus_id'] ?></td>
            <td>
                <a href="/college/public/uploads/syllabus/<?= htmlspecialchars($row['file_path']) ?>" target="_blank">View</a>
            </td>
            <td class="action-buttons">
                <a href="<?= BASE_URL ?>syllabus-edit&id=<?= $row['syllabus_id'] ?>" class="btn btn-edit">Edit</a>
                <a href="<?= BASE_URL ?>syllabus-delete&id=<?= $row['syllabus_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="3">No syllabus found.</td>
    </tr>
<?php } ?>

</table>

</div>