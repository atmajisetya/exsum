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
    <link rel="stylesheet" href="/css/home.css">

    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aee467f5c4.js" crossorigin="anonymous"></script>

    <title>Register | Executive Summary Website</title>
</head>

<body>

    <div class="container">
        <form method="POST" action="/home/save">
            <?= csrf_field(); ?>
            <img src="/img/logo.png">
            <h3 class="text-end fw-normal mt-4">Create your</h3>
            <h3 class="text-end fw-normal"><strong>Account</strong></h3>
            <div class="input-box">
                <input class="form-control mt-4 <?= ($validation->hasError('user_name')) ?
                                                    'is-invalid' : ''; ?>" type="text" placeholder="Name" name="user_name" value="<?= old('user_name'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('user_name'); ?>
                </div>
            </div>
            <div class="input-box">
                <input class="form-control mt-4 <?= ($validation->hasError('user_position')) ?
                                                    'is-invalid' : ''; ?>" type="text" placeholder="Job Position" name="user_position" value="<?= old('user_position'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('user_position'); ?>
                </div>
            </div>
            <div class="input-box">
                <input class="form-control mt-4 <?= ($validation->hasError('user_email')) ?
                                                    'is-invalid' : ''; ?>" type="email" placeholder="Email" name="user_email" value="<?= old('user_email'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('user_email'); ?>
                </div>
            </div>
            <div class="input-box">
                <input class="form-control mt-4 <?= ($validation->hasError('user_password')) ?
                                                    'is-invalid' : ''; ?>" type="password" placeholder="Password" name="user_password">
                <div class="invalid-feedback">
                    <?= $validation->getError('user_password'); ?>
                </div>
            </div>
            <div class="input-box">
                <input class="form-control mt-2 <?= ($validation->hasError('confpassword')) ?
                                                    'is-invalid' : ''; ?>" type="password" placeholder="Confirm Password" name="confpassword">
                <div class="invalid-feedback">
                    <?= $validation->getError('confpassword'); ?>
                </div>
            </div>
            <div class=" mt-2 d-grid gap-2  mb-3">
                <input type="submit" class="btn btn-secondary" role="button" value="Register">
            </div>
            <div class=" mt-4 d-grid gap-2">
                <a href="/home" class="btn btn-danger">Login</a>
            </div>
        </form>
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