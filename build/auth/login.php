<?php

require($_SERVER['DOCUMENT_ROOT'] . "/init.php");

csrf_val($_POST['CSRFtoken']);

if (empty($_POST['username']) || empty($_POST['password'])) {
    redirect('https://sd.keepcalm-o-matic.co.uk/i-w600/keep-calm-and-don-t-hack-me.jpg');
}

$username = clean_data($_POST['username']);
$password = clean_data($_POST['password']);

$queryDocent =
    "SELECT
        id,
        class,
        active,
        password,
        failed_login
    FROM
        docenten
    WHERE
        email='{$username}'";

$queryLeerling =
    "SELECT
        id,
        class,
        active,
        password,
        failed_login,
        admin
    FROM
        leerlingen
    WHERE
        email='{$username}' OR leerling_nummer='{$username}'";

$userDocent = sql_query($queryDocent, false);
$userLeerling = sql_query($queryLeerling, false);

if ($userDocent->num_rows > 0) {
    $user = $userDocent->fetch_assoc();
} elseif ($userLeerling->num_rows > 0) {
    $user = $userLeerling->fetch_assoc();
} else {
    redirect('/?reset', 'Het is niet mogelijk om in te loggen met de ingevulde gegevens.');
}

if (password_verify($password, $user['password'])) {
    if ($user['failed_login'] > 4) {
        log_action($_SESSION['id'], 'auth_denied_login_blocked');
        redirect('/?reset', 'Uw account is geblokkeerd, contacteer AUB de administrator om uw account te deblokkeren');
    } else {
        sql_query("UPDATE leerlingen SET failed_login='0' WHERE id='{$user['id']}'", false);
        sql_query("UPDATE docenten SET failed_login='0' WHERE id='{$user['id']}'", false);
    }

    if (!$user['active']) {
        log_action($_SESSION['id'], 'auth_denied_login_inactive');
        redirect('/?reset', 'Uw account is nog niet actief, klik op de link in  uw mail om uw account te activeren');
    }

    $_SESSION['logged_in'] = true;
    $_SESSION['ip'] = ip();
    $_SESSION['id'] = $user['id'];
    $_SESSION['class'] = $user['class'];

    if (isset($user['admin'])) {
        $_SESSION['admin'] = $user['admin'];
    }

    session_regenerate_id(true);

    $return_to = $_SESSION['return_url'];
    unset($_SESSION['return_url']);

    log_action($_SESSION['id'], 'auth_accept_login');

    if (!empty($return_to)) {
        redirect($return_to, 'U bent ingelogd');
    } else {
        redirect('/general/home', 'U bent ingelogd');
    }
} else {
    redirect('/?reset', 'Het is niet mogelijk om in te loggen met de ingevulde gegevens.');
}