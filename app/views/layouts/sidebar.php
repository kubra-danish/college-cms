<?php
$currentPage = $_GET['url'] ?? 'dashboard';
$role = strtolower($_SESSION['role'] ?? 'admin');

$facultyMenuOpen = in_array($currentPage, [
    'faculty',
    'attendance', 'attendance-add', 'attendance-edit',
    'faculty-leave', 'faculty-leave-add', 'faculty-leave-edit',
    'notes', 'notes-add', 'notes-edit',
    'syllabus', 'syllabus-add', 'syllabus-edit'
]);
?>

<div class="main-wrapper">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="sidebar-brand-text">College CMS</span>
            <span class="sidebar-brand-icon d-none">C</span>
        </div>

        <a href="/college/public/index.php?url=dashboard" class="<?= $currentPage === 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-house-door-fill"></i>
            <span class="link-text">Dashboard</span>
        </a>

        <a href="/college/public/index.php?url=profile" class="<?= $currentPage === 'profile' ? 'active' : '' ?>">
            <i class="bi bi-person-circle"></i>
            <span class="link-text">Profile</span>
        </a>

        <?php if ($role === 'admin'): ?>
            <a href="/college/public/index.php?url=students" class="<?= $currentPage === 'students' ? 'active' : '' ?>">
                <i class="bi bi-mortarboard-fill"></i>
                <span class="link-text">Students</span>
            </a>

            <div class="sidebar-dropdown">
                <button type="button" class="sidebar-dropdown-btn <?= $facultyMenuOpen ? 'active' : '' ?>" onclick="toggleFacultySubmenu()">
                    <div class="dropdown-left">
                        <i class="bi bi-person-workspace"></i>
                        <span class="link-text">Faculty</span>
                    </div>
                    <i class="bi bi-chevron-down dropdown-arrow <?= $facultyMenuOpen ? 'rotate' : '' ?>"></i>
                </button>

                <div id="facultySubmenu" class="sidebar-submenu <?= $facultyMenuOpen ? 'show' : '' ?>">
                    <a href="/college/public/index.php?url=attendance" class="<?= str_starts_with($currentPage, 'attendance') ? 'active' : '' ?>">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span class="link-text">Attendance</span>
                    </a>

                    <a href="/college/public/index.php?url=faculty-leave" class="<?= str_starts_with($currentPage, 'faculty-leave') ? 'active' : '' ?>">
                        <i class="bi bi-calendar-x-fill"></i>
                        <span class="link-text">Faculty Leave</span>
                    </a>

                    <a href="/college/public/index.php?url=notes" class="<?= str_starts_with($currentPage, 'notes') ? 'active' : '' ?>">
                        <i class="bi bi-journal-text"></i>
                        <span class="link-text">Notes</span>
                    </a>

                    <a href="/college/public/index.php?url=syllabus" class="<?= str_starts_with($currentPage, 'syllabus') ? 'active' : '' ?>">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span class="link-text">Syllabus</span>
                    </a>
                </div>
            </div>

            <a href="#"><i class="bi bi-cash-stack"></i><span class="link-text">Fees</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-bar-chart-fill"></i><span class="link-text">Reports</span></a>
            <a href="#"><i class="bi bi-gear-fill"></i><span class="link-text">Settings</span></a>
        <?php elseif ($role === 'faculty'): ?>
            <a href="#"><i class="bi bi-calendar-check-fill"></i><span class="link-text">Attendance</span></a>
            <a href="#"><i class="bi bi-people-fill"></i><span class="link-text">Students</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-journal-text"></i><span class="link-text">Assignments</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
        <?php elseif ($role === 'student'): ?>
            <a href="#"><i class="bi bi-calendar-check-fill"></i><span class="link-text">Attendance</span></a>
            <a href="#"><i class="bi bi-card-checklist"></i><span class="link-text">Results</span></a>
            <a href="#"><i class="bi bi-clock-history"></i><span class="link-text">Timetable</span></a>
            <a href="#"><i class="bi bi-cash-stack"></i><span class="link-text">Fees</span></a>
            <a href="#"><i class="bi bi-megaphone-fill"></i><span class="link-text">Notices</span></a>
        <?php endif; ?>

        <a href="/college/public/index.php?url=logout">
            <i class="bi bi-box-arrow-right"></i>
            <span class="link-text">Logout</span>
        </a>
    </aside>

    <div class="content-area">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-btn" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <div>
                    <h5 class="mb-0"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h5>
                    <small class="text-muted">Welcome, <?= htmlspecialchars($_SESSION['user_name'] ?? 'User') ?></small>
                </div>
            </div>

            <div>
                <span class="badge bg-dark"><?= htmlspecialchars($_SESSION['role'] ?? 'User') ?></span>
            </div>
        </div>

        <main class="page-content">

<script>
function toggleFacultySubmenu() {
    const submenu = document.getElementById('facultySubmenu');
    const arrow = document.querySelector('.dropdown-arrow');
    submenu.classList.toggle('show');
    arrow.classList.toggle('rotate');
}
</script>