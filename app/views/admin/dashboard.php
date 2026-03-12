<?php
$pageTitle = 'Admin Dashboard';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../layouts/sidebar.php';
?>

<div class="container-fluid">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success">User updated successfully.</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert alert-success">User deleted successfully.</div>
    <?php endif; ?>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-people-fill"></i></div>
                    <div class="metric-label">Total Users</div>
                    <h2 class="metric"><?= htmlspecialchars($totalUsers) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-mortarboard-fill"></i></div>
                    <div class="metric-label">Students</div>
                    <h2 class="metric"><?= htmlspecialchars($totalStudents) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-person-workspace"></i></div>
                    <div class="metric-label">Faculty</div>
                    <h2 class="metric"><?= htmlspecialchars($totalFaculty) ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="metric-icon"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="metric-label">Active Users</div>
                    <h2 class="metric"><?= htmlspecialchars($activeUsers) ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card surface-card">
                <div class="card-header">Recent Users</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recentUsers)): ?>
                                <?php foreach ($recentUsers as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><?= htmlspecialchars(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?></td>
                                        <td><?= htmlspecialchars($user['role_name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card surface-card mb-4">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <a href="/college/public/index.php?url=students" class="btn btn-primary w-100 mb-2 quick-link">
                        <i class="bi bi-mortarboard-fill"></i> <span>Students</span>
                    </a>
                    <a href="/college/public/index.php?url=faculty" class="btn btn-outline-secondary w-100 mb-2 quick-link">
                        <i class="bi bi-person-workspace"></i> <span>Faculty</span>
                    </a>
                    <button class="btn btn-outline-secondary w-100 quick-link">
                        <i class="bi bi-bar-chart-fill"></i> <span>Reports</span>
                    </button>
                </div>
            </div>

            <div class="card surface-card">
                <div class="card-header">Latest Activity</div>
                <div class="card-body">
                    <p class="small-muted mb-2">Admin logged in successfully.</p>
                    <p class="small-muted mb-2">Counts and users are loaded from the database.</p>
                    <p class="small-muted mb-0">Use Students and Faculty pages to manage records.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>