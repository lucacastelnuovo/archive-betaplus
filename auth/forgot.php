<?php
require($_SERVER['DOCUMENT_ROOT'] . "/init.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_val($_POST['CSRFtoken']);

    if (empty($_POST['email'])) {
        redirect('/auth/change', 'Vul aub alle velden in');
    }

    $email = clean_data($_POST['email']);

    $token = gen(128);
    $date = date('Y-m-d H:i:s');

    $query =
    "INSERT INTO
        tokens
            (token,
            type,
            created,
            days_valid,
            user)
    VALUES
        ('{$token}',
        'password_reset',
        '{$date}',
        '7',
        '{$email}')";

    sql_query($query, false);

    redirect('/?reset', 'Check uw email for een reset link');
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#003d14">

    <title>Wachtwoord vergeten</title>
    <meta content="INSERT DESCRIPTION" name="description">
    <meta content="Betasterren, Beta Sterren, Het Baarnsch Lyceum, beta+, beta hbl" name="keywords">

    <!-- Tells Google not to provide a translation for this document -->
    <meta name="google" content="notranslate">

    <!-- Control the behavior of search engine crawling and indexing -->
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    <!-- Favicons/Icons -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" sizes="192x192" href="https://betasterren.lucacastelnuovo.nl/favicon.png">
    <link rel="apple-touch-icon" href="https://betasterren.lucacastelnuovo.nl/favicon.png">
    <link rel="mask-icon" href="https://betasterren.lucacastelnuovo.nl/favicon.png" color="green">

    <!--Import Materialize CSS-->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!--Import Custom CSS-->
    <link rel="stylesheet" href="/css/style.css">

    <!--Import Google Icon Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-image">
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card login">
                <div class="card-action color-primary--background hover-disable white-text">
                    <h3>Wachtwoord vergeten</h3>
                </div>
                <div class="card-content">
                    <form action="/auth/change.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">Uw email adress</label>
                                <input type="email" id="email" name="email" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="CSRFtoken" value="<?= csrf_gen() ?>" />
                            <button type="submit" class="waves-effect waves-light btn color-primary--background width-full">Vraag nieuw wachtwoord aan</button>
                        </div>
                        <a href="/" class="right">Terug naar login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--Import Materialize JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <?php alert_display(); ?>
</body>

</html>
