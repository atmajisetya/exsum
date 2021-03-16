<?php
$session = session();
$user_id = $session->get('user_id');

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="/css/styledashbord.css">

    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aee467f5c4.js" crossorigin="anonymous"></script>

    <title>Lesson Learned | Executive Summary</title>
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/project">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/om">Operation Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actreport.html">Activity Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actplan.html">Activity Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="genreport.html">Generate Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lesson">Lesson Learned</a>
                    </li>
                </ul>
                <div class="dropdown ms-auto">
                    <button class="user dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-2x"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="accountinfo.html"><?= session()->get('user_name'); ?></a></li>
                        <li><a class="dropdown-item" href="/home/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-4">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>

    <!--Tambah Project-->
    <section id="tambahProject">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#buatProject" data-bs-whatever="@mdo">
            <i class="fas fa-plus"></i>
            <p>New Lesson</p>
        </button>
        <div class="modal fade" id="buatProject" tabindex="-1" aria-labelledby="buatProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buatProjectLabel">New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- menambahkan lesson -->
                        <form method="POST" action="/lesson/save">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="created_by" value="<?= $user_id; ?>">
                            <div class="mb-1">
                                <label for="issues" class="col-form-label">Issues :</label>
                                <input type="text" class="form-control" id="issues" name="lesson_issue" required>
                            </div>
                            <div class="mb-1">
                                <label for="solution" class="col-form-label">Solution :</label>
                                <input type="text" class="form-control" id="solution" name="lesson_solution" required>
                            </div>
                            <div class="mb-1">
                                <label for="actionPlan" class="col-form-label">Action Plan :</label>
                                <input type="text" class="form-control" id="actionPlan" name="lesson_action" required>
                            </div>
                            <div class="mb-1">
                                <label for="actionPlan" class="col-form-label">Period :</label>
                                <input type="text" class="form-control" id="actionPlan" name="lesson_period" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <h1 class="text-end mb-3">
            <strong>Lesson Learned</strong>
        </h1>
    </div>


    <!--Tabel-->
    <div class="displayProject">
        <div class="row-content">
            <div class="table-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Issues</th>
                            <th scope="col">Solution</th>
                            <th scope="col">Action Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lesson as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['lesson_issue']; ?></td>
                                <td><?= $p['lesson_solution']; ?></td>
                                <td><?= $p['lesson_action']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-light me-3 text-start" data-bs-toggle="modal" data-bs-target="#editProfil" data-bs-whatever="@mdo">
                                        Update
                                    </button>
                                    <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editProfilLabel">Update Lesson Learned</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- update lesson -->
                                                    <form method="POST" action="/lesson/update/<?= $p['id']; ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="created_by" value="<?= $user_id; ?>">
                                                        <div class="mb-1">
                                                            <label for="issues" class="col-form-label">Issues :</label>
                                                            <input type="text" class="form-control" id="issues" name="lesson_issue" required value="<?= $p['lesson_issue']; ?>">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="solution" class="col-form-label">Solution :</label>
                                                            <input type="text" class="form-control" id="solution" name="lesson_solution" required value="<?= $p['lesson_solution']; ?>">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="actionPlan" class="col-form-label">Action Plan :</label>
                                                            <input type="text" class="form-control" id="actionPlan" name="lesson_action" required value="<?= $p['lesson_action']; ?>">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="actionPlan" class="col-form-label">Period :</label>
                                                            <input type="text" class="form-control" id="actionPlan" name="lesson_period" required value="<?= $p['lesson_period']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="/lesson/<?= $p['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                    </form>

            </div>
            </td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>