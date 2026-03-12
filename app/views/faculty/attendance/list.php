<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<h2 class="page-title">Attendance List</h2>

<div class="table-wrapper">

    <div class="top-bar">
        <a href="<?= BASE_URL ?>attendance-add" class="btn btn-add">
            Add Attendance
        </a>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Total Classes</th>
            <th>Attended Classes</th>
            <th>Percentage</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($records)) { ?>
            <?php foreach ($records as $row) { 
                $percentage = $row['total_classes'] > 0 
                    ? round(($row['attended_classes'] / $row['total_classes']) * 100, 2) 
                    : 0;
            ?>
                <tr>
                    <td><?= $row['attendance_id'] ?></td>
                    <td><?= $row['attendance_date'] ?></td>
                    <td><?= $row['total_classes'] ?></td>
                    <td><?= $row['attended_classes'] ?></td>
                    <td><?= $percentage ?>%</td>
                    <td class="action-buttons">
                        <a href="<?= BASE_URL ?>attendance-edit&id=<?= $row['attendance_id'] ?>" class="btn btn-edit">
                            Edit
                        </a>
                        <a href="<?= BASE_URL ?>attendance-delete&id=<?= $row['attendance_id'] ?>" class="btn btn-delete"
                           onclick="return confirm('Are you sure?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="6">No attendance records found.</td>
            </tr>
        <?php } ?>
    </table>
</div>