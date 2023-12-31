<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>CHAT LOGIN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?= URL ?>public/assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= URL ?>public/assets/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="<?= URL ?>public/assets/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= URL ?>public/assets/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="<?= URL ?>public/assets/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="<?= URL ?>public/assets/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="<?= URL ?>public/assets/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="container">
       <div class="row">
        <div class="col-6 offset-3">
        <main class="form-signin">
            <form id="loginFormUser">
                <img class="mb-4" src="<?= URL ?>public/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <button class="w-100 btn btn-lg btn-success mt-2" type="button"><a href="<?=URL?>login/register">Sign up</a></button>
                <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
            </form>
        </main>
        </div>
       </div>
    </div>




</body>
<script src="<?=URL ?>public/assets/jquery/jquery.3.6.0.js" ></script>


</html>

<?php
if (isset($this->js)) {
  foreach ($this->js as $js) {
    echo '<script src="' . URL . 'views/' . $js . '"></script>';
  }
}
?>