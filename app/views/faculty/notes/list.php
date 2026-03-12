<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<h2 class="page-title">Notes</h2>

<div class="table-wrapper">

<div class="top-bar">
<a href="<?= BASE_URL ?>notes-add" class="btn btn-add">
Add Notes
</a>
</div>

<table class="table">

<tr>
<th>ID</th>
<th>Subject</th>
<th>Title</th>
<th>File</th>
<th>Actions</th>
</tr>

<?php if (!empty($records)) { ?>
    <?php foreach ($records as $row) { ?>
        <tr>
            <td><?= $row['note_id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td>
                <a href="/college/public/uploads/notes/<?= htmlspecialchars($row['file_path']) ?>" target="_blank">View</a>
            </td>
            <td class="action-buttons">
                <a href="<?= BASE_URL ?>notes-edit&id=<?= $row['note_id'] ?>" class="btn btn-edit">Edit</a>
                <a href="<?= BASE_URL ?>notes-delete&id=<?= $row['note_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="4">No notes found.</td>
    </tr>
<?php } ?>
</table>

</div>