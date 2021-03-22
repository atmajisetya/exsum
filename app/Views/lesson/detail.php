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

    <title>Detail Lesson Learned | Executive Summary</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="actreport.html">Activity Report</a>
                    </li>
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

    <div class="container">
        <div>
            <h2 class="text-center">
                <strong>
                    Detail Lesson
                </strong>
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="row" id="frame-luar">
            <div class="judul">
                <h3 class="text-center">
                    <strong>
                        Judul
                    </strong>
                </h3>
            </div>
            <div class="desc text-center mt-2 mb-4">
                <h4>
                    Desc
                </h4>
            </div>
            <div class="row" id="detail-project">
                <div class="col-6">
                    <p>Issues :</p>
                    <p>Solution :</p>
                    <p>Action Plan:</p>
                    <p>Period :</p>
                </div>
                <div class="col-6">
                    <p><?= $lesson['lesson_issue']; ?></p>
                    <p><?= $lesson['lesson_solution']; ?></p>
                    <p><?= $lesson['lesson_action']; ?></p>
                    <p><?= $lesson['lesson_period']; ?></p>
                </div>
                <div class="mt-5">
                    <h6>
                        Status :
                    </h6>
                </div>

                <div class="mt-5">
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
                                    <form method="POST" action="/lesson/update/<?= $lesson['id']; ?>">
                                        <div class="mb-1">
                                            <label for="issues-ls" class="col-form-label">Issues :</label>
                                            <input type="text" class="form-control" id="issues-ls" name="lesson_issue" required value="<?= $lesson['lesson_issue']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="solution-ls" class="col-form-label">Solution :</label>
                                            <input type="text" class="form-control" id="solution-ls" name="lesson_solution" required value="<?= $lesson['lesson_solution']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="plan-ls" class="col-form-label">Action Plan :</label>
                                            <textarea rows="4" cols="50" class="form-control" id="plan-ls" name="lesson_action" required value="<?= $lesson['lesson_action']; ?>"></textarea>
                                        </div>
                                        <div class="mb-1">
                                            <label for="period-ls" class="col-form-label">Period:</label>
                                            <input type="text" class="form-control" id="period-ls" name="lesson_period" required value="<?= $lesson['lesson_period']; ?>">
                                        </div>
                                        <!--
                                        <div class="mb-1">
                                            <label for="created-by-ls" class="col-form-label">created by:</label>
                                            <input type="text" class="form-control" id="created-by-ls">
                                        </div>
                                        <div class="mb-1">
                                            <label for="created-at-ls" class="col-form-label">Created At:</label>
                                            <input type="date" class="form-control" id="created-at-ls">
                                        </div>
                                        <div class="mb-1">
                                            <label for="upd-ls" class="col-form-label">Updated At:</label>
                                            <input type="date" class="form-control" id="upd-ls">
                                        </div>
                                        -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="/lesson/<?= $lesson['id']; ?>" method="POST" class="d-inline">
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