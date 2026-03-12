<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<h2 class="page-title">Faculty Leave Applications</h2>

<div class="table-wrapper">
<div class="top-bar">

<a href="<?= BASE_URL ?>faculty-leave-add" class="btn btn-add">
Apply Leave
</a>

</div>



<table class="table">

<tr>
<th>ID</th>
<th>Faculty</th>
<th>Type</th>
<th>From</th>
<th>To</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php if (!empty($records)) { ?>
    <?php foreach ($records as $row) { ?>
        <tr>
            <td><?= $row['leave_id'] ?></td>
            <td><?= $row['leave_type'] ?></td>
            <td><?= $row['from_date'] ?></td>
            <td><?= $row['to_date'] ?></td>
            <td><?= $row['status'] ?></td>
            <td class="action-buttons">
                <a href="<?= BASE_URL ?>faculty-leave-edit&id=<?= $row['leave_id'] ?>" class="btn btn-edit">Edit</a>
                <a href="<?= BASE_URL ?>faculty-leave-delete&id=<?= $row['leave_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="6">No leave records found.</td>
    </tr>
<?php } ?>


</table>