<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College CMS | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/college/public/assets/css/public.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/college/public/index.php">College CMS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="/college/public/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-light" href="/college/public/index.php?url=login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="hero-title mb-3">Welcome to College CMS</h1>
                <p class="hero-subtitle mb-4">
                    A smart, secure and organized platform for managing students, faculty,
                    admissions, attendance, results, and academic records.
                </p>
                <a href="/college/public/index.php?url=login" class="btn btn-light btn-lg btn-hero me-2">Login to Portal</a>
                <a href="#about" class="btn btn-outline-light btn-lg btn-hero">Explore Features</a>
            </div>

            <div class="col-lg-5">
                <div class="card hero-card">
                    <div class="card-body p-4 text-dark">
                        <h4 class="mb-4 fw-bold">Core Modules</h4>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-people-fill"></i></div>
                                        <h6 class="mb-0">User Management</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-journal-check"></i></div>
                                        <h6 class="mb-0">Admissions</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-mortarboard-fill"></i></div>
                                        <h6 class="mb-0">Student Module</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-person-workspace"></i></div>
                                        <h6 class="mb-0">Faculty Module</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-calendar-check-fill"></i></div>
                                        <h6 class="mb-0">Attendance</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card feature-card">
                                    <div class="card-body text-center">
                                        <div class="feature-icon mx-auto"><i class="bi bi-card-checklist"></i></div>
                                        <h6 class="mb-0">Results</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</section>

<section id="about" class="py-5">
    <div class="container">
        <div class="card team-card">
            <div class="card-body p-4 p-lg-5">
                <h2 class="section-title text-center">Developer Team</h2>
                <p class="section-subtitle text-center">
                    This CMS was completely developed under academic guidance and team collaboration.
                </p>

                <p class="lead-note text-center mb-4">
                    <strong>This CMS was completely developed under the guidelines of:</strong><br>
                    <strong>Athar Shaikh</strong><br>
                    Founder of DharwadHubliTutors
                </p>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="developer-item">
                            <div class="developer-name">Mohammad Saad Mirjanavar</div>
                            <div class="developer-role">User Management Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Mohammed Shakir Ali Yadwad</div>
                            <div class="developer-role">Admission Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Jabeen Bepari</div>
                            <div class="developer-role">Student Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Shaziya Yaragatti</div>
                            <div class="developer-role">Student Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Taslim Meeranavar</div>
                            <div class="developer-role">Faculty Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Bibi Asiya Karnool</div>
                            <div class="developer-role">Faculty Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Rubina Makandar</div>
                            <div class="developer-role">Faculty Module</div>
                        </div>

                        <div class="developer-item">
                            <div class="developer-name">Farhat Bahadur</div>
                            <div class="developer-role mb-0">Cyber Security Management</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="pb-5">
    <div class="container">
        <div class="card warning-card">
            <div class="card-body p-4 text-center">
                <h5 class="warning-title mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Warning Message</h5>
                <p class="mb-0">
                    Unauthorized access, modification, misuse, or distribution of this College CMS
                    and its data is strictly prohibited. This project is intended for academic and
                    educational use only.
                </p>
            </div>
        </div>
    </div>
</section>

<footer class="public-footer py-3">
    <div class="container text-center">
        <small>© 2026 College CMS. All rights reserved.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>