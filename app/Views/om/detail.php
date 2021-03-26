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

    <!-- google chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            <?php
            $progress = $om['om_progress'];
            $remaining = 100 - $progress;

            ?>

            var data = google.visualization.arrayToDataTable([
                ['Completion', 'Percentage'],
                ['Completed', <?= $progress ?>],
                ['Remaining', <?= $remaining; ?>]
            ]);

            var options = {
                title: 'OM Progress'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>


    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aee467f5c4.js" crossorigin="anonymous"></script>

    <title>Detail OM | Executive Summary</title>
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
    <!-- menampilkan flash message ketika OM diubah -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-4">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>

    <div class="container">
        <div>
            <h2 class="text-center">
                <strong>
                    Operational Management
                </strong>
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="row" id="frame-luar">
            <div class="judul">
                <h3 class="text-center">
                    <strong>
                        <?= $om['om_activities']; ?>
                    </strong>
                </h3>
            </div>
            <div class="desc text-center mt-2 mb-4">
                <h4>
                    <?= $om['om_description']; ?>
                </h4>
            </div>
            <div class="row" id="detail-project">
                <div class="col-4">
                    <p>Category :</p>
                    <p>PIC :</p>
                    <p>Period :</p>
                </div>
                <div class="col-4">
                    <p><?= $om['om_category']; ?></p>
                    <p><?= $om['om_pic']; ?></p>
                    <p><?= $om['om_period']; ?></p>
                </div>

                <div>
                    <h5 class="text-center mt-4">
                        PROGRESS
                    </h5>
                </div>

                <div class="text-center mt-2">
                    <div id="piechart" style="width: 700px; height: 300px;"></div>
                </div>

                <div class="mt-5">
                    <h6>
                        Status :
                    </h6>
                    <?= $om['om_status']; ?>
                </div>

                <div class="mt-5">
                    <button type="button" class="btn btn-light me-3 text-start" data-bs-toggle="modal" data-bs-target="#editProfil" data-bs-whatever="@mdo">
                        Update
                    </button>
                    <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfilLabel">Update Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/om/update/<?= $om['id']; ?>">
                                        <?= csrf_field(); ?>
                                        <div class="mb-1">
                                            <label for="activity" class="col-form-label">Activity:</label>
                                            <input type="text" class="form-control" id="activity" name="om_activities" required value="<?= $om['om_activities']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <input type="text" class="form-control" id="description" name="om_description" required value="<?= $om['om_description']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="category" class="col-form-label">Category:</label>
                                            <input type="text" class="form-control" id="category" name="om_category" required value="<?= $om['om_category']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="person" class="col-form-label">Person in Charge :</label>
                                            <input type="text" class="form-control" id="person" name="om_pic" required value="<?= $om['om_pic']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="period" class="col-form-label">Period :</label>
                                            <input type="text" class="form-control" id="period" name="om_period" required value="<?= $om['om_period']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="status" class="col-form-label">Status :</label>
                                            <input type="text" class="form-control" id="status" name="om_status" required value="<?= $om['om_status']; ?>">
                                        </div>
                                        <div class="mb-1">
                                            <label for="progress" class="col-form-label">Progress:</label>
                                            <input type="text" class="form-control" id="progress" name="om_progress" required value="<?= $om['om_progress']; ?>">
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
                    <form action="/om/<?= $om['id']; ?>" method="POST" class="d-inline">
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