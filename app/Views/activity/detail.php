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

    <title>Detail Activities | Executive Summary</title>
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="/img/logo_2.png">
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
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="actreport.html">Activity Report</a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="/activity">Activity Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">Generate Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project/success">Success Stories</a>
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
    <!-- menampilkan flash message ketika Activity diubah -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-4">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>

    <div class="container">
        <div>
            <h2 class="text-center">
                <strong>
                    Activity Plan
                </strong>
            </h2>
        </div>
    </div>

    <div class="container">

        <div class="row" id="frame-luar2">
            <!--

            <div class="judul">
                <h3 class="text-center">
                    <strong>

                    </strong>
                </h3>
            </div>
            <div class="desc text-center mt-2 mb-4">
                <h4>

                </h4>
            </div>
            -->

            <div class="row" id="detail-project">
                <div class="col-6">
                    <p>Main Activities:</p>
                    <p>Subactivities :</p>
                    <p>Objective :</p>
                    <p>Target :</p>
                    <p>Status :</p>
                    <p>Period :</p>
                </div>
                <div class="col-6">
                    <p><?= $activity['activities_main']; ?></p>
                    <p><?= $activity['activities_submain']; ?></p>
                    <p><?= $activity['activities_objective']; ?></p>
                    <p><?= $activity['activities_target']; ?></p>
                    <p><?= $activity['activities_status']; ?></p>
                    <p><?= $activity['activities_period']; ?></p>
                </div>

                <div class="mt-5">
                    <h6>
                        Status :
                    </h6>
                    <?= $activity['activities_status']; ?>
                </div>

                <div class="mt-5">
                    <button type="button" class="btn btn-light me-3 text-start" data-bs-toggle="modal" data-bs-target="#editProfil" data-bs-whatever="@mdo">
                        Update
                    </button>
                    <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfilLabel">Update Activity Plan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/activity/update/<?= $activity['id']; ?>">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="created_by" value="<?= $user_id; ?>">
                                        <div class="mb-1">
                                            <label for="main-program" class="col-form-label">Main Program:</label>
                                            <input type="text" class="form-control" id="main-program" name="activities_main" value="<?= $activity['activities_main']; ?>" required>
                                        </div>
                                        <div class="mb-1">
                                            <label for="activity" class="col-form-label">Activity :</label>
                                            <input type="text" class="form-control" id="activity" name="activities_submain" value="<?= $activity['activities_submain']; ?>" required>
                                        </div>
                                        <div class="mb-1">
                                            <label for="objective" class="col-form-label">Objective :</label>
                                            <input type="text" class="form-control" id="objective" name="activities_objective" value="<?= $activity['activities_objective']; ?>" required>
                                        </div>
                                        <div class="mb-1">
                                            <label for="target" class="col-form-label">Target :</label>
                                            <input type="text" class="form-control" id="target" name="activities_target" value="<?= $activity['activities_target']; ?>" required>
                                        </div>

                                        <div class="mb-1">
                                            <label for="period" class="col-form-label">Period :</label>
                                            <input type="text" class="form-control" id="period" name="activities_period" value="<?= $activity['activities_period']; ?>" required>
                                        </div>
                                        <div class="mb-1">
                                            <label for="status" class="col-form-label">Status :</label>
                                            <input type="text" class="form-control" id="status" name="activities_status" value="<?= $activity['activities_status']; ?>" required>
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
                    <form action="/activity/<?= $activity['id']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                    </form>
                </div>

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