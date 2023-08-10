
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL?>public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= URL?>public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= URL?>public/assets/css/app.css">
    <link rel="stylesheet" href="<?= URL?>public/assets/css/pages/error.css">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="<?= URL?>public/assets/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">PAS TROUVÉ</h1>
                    <p class='fs-5 text-gray-600'>La page que vous recherchez est introuvable.</p>
                    <a href="<?= URL?>home" class="btn btn-lg btn-outline-primary mt-3">Aller à la page d'accueil</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>