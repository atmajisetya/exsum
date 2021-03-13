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
    <link rel="stylesheet" href="/css/styledashboard.css">

    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aee467f5c4.js" crossorigin="anonymous"></script>

    <title>Dashbord | Executive Summary</title>
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <img src="/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Operation Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activity Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activity Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chart Generator</a>
                    </li>
                </ul>
                <div class="dropdown ms-auto">
                    <button class="btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-2x"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#"><?= session()->get('user_name'); ?></a></li>
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
            <p>New Project</p>
        </button>
        <div class="modal fade" id="buatProject" tabindex="-1" aria-labelledby="buatProjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buatProjectLabel">New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-1">
                                <label for="project-name" class="col-form-label">Project Name :</label>
                                <input type="text" class="form-control" id="project-name">
                            </div>
                            <div class="mb-1">
                                <label for="project-manager" class="col-form-label">Project Manager :</label>
                                <input type="text" class="form-control" id="project-manager">
                            </div>
                            <div class="mb-1">
                                <label for="description" class="col-form-label">Description :</label>
                                <input type="text" class="form-control" id="description">
                            </div>
                            <div class="mb-1">
                                <label for="activity" class="col-form-label">Activity :</label>
                                <input type="text" class="form-control" id="activity">
                            </div>
                            <div class="mb-1">
                                <label for="tanggal-mulai" class="col-form-label">Start Date :</label>
                                <input type="text" class="form-control" id="tanggal-mulai">
                            </div>
                            <div class="mb-1">
                                <label for="tanggal-selesai" class="col-form-label">Target Finish :</label>
                                <input type="text" class="form-control" id="tanggal-selesai">
                            </div>
                            <div class="mb-1">
                                <label for="unit-terlibat" class="col-form-label">Stackeholders :</label>
                                <input type="text" class="form-control" id="unit-terlibat">
                            </div>
                            <div class="mb-1">
                                <label for="progress" class="col-form-label">Progress :</label>
                                <input type="text" class="form-control" id="progress">
                            </div>
                            <div class="mb-1">
                                <label for="resource" class="col-form-label">Resource :</label>
                                <input type="text" class="form-control" id="resource">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <h1 class="text-end">
            <strong>Project</strong>
        </h1>
    </div>


    <!--Tabel-->
    <div class="displayProject">
        <div class="row">
            <div class="crud-option">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="#">Edit</button>
                <button type="reset" class="btn btn-light" data-bs-dismiss="#">Delete</button>
            </div>
            <div class="table-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Project</th>
                            <th scope="col">Description</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Finish at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Finest Telin</th>
                            <td>Implementasi imprest fund di Telin dengan FINEST</td>
                            <td>Develop Aplikasi</td>
                            <td>2019</td>
                        </tr>
                        <tr>
                            <th scope="row">SMART</th>
                            <td>Aplikasi Monitoring Invoice Dokumen</td>
                            <td>Develop Apliasi</td>
                            <td>2019</td>
                        </tr>
                        <tr>
                            <th scope="row">FINEC</th>
                            <td>Tools sebagai integrator antara tools SIMPKBL pada unit CDC
                                dengan FINST khusus antara pertanggungan bina lingkungan
                            </td>
                            <td>Develop Aplikasi</td>
                            <td>2019</td>
                        </tr>
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