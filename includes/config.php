<?php

return (object) array(
    'app' => (object) array(
        'url' => "https://betasterren.hetbaarnschlyceum.nl",
        'domain' => "betasterren.hetbaarnschlyceum.nl",
    ),

    'security' => (object) array(
        'database' => (object) array(
            'host' => "localhost",
            'user' => "betasterren",
            'password' => 'I0$pge69v2ukoHF9iec1YDuli73racMWXC2JM^&$nQkSsy#M',
            'database' => "betasterren_db",
        ),

        'hmac'=>"XpkTQwW6K5Ni4rf3xpF2gNkmT0zlGJhWDtIXQRbWu3CJ5PJznZy4HzBYhJu0z8h",
    ),

    'api' => (object) array(
        'mail' => (object) array(
            'host' => "smtp.strato.com",
            'smtpauth' => "true",
            'smtpsecure' => "ssl",
            'port' => "465",
            'username' => "no-reply@lucacastelnuovo.nl",
            'password' => "1BWWeAGWaYTjAECKqHlXulzRf1euc3mHzti155KSYH0x28uiZMq3blT13zOo9MpJDedYezF0YGx1sPsTJCU3heskArhJqo7nxMkfUtofxKRhNg0dvFcYIq0ht1s5a3sH",

            'from' => "no-reply@lucacastelnuovo.nl",
            'from_name' => "BetaSterren || HBL",
        ),

        'recaptcha' => (object) array(
            'private' => "6LcX_XkUAAAAAF-QhQzTZWkJ__J2N5ECDXHlOH9j",
            'public' => "6LcX_XkUAAAAAFheWsBUreNsbJftLIbJ0C9p5ZHi",
            'library' => "https://www.google.com/recaptcha/api.js",
        ),

        'imgur' => (object) array(
            'key' => "b2c72661027878c",
            'url' => "/libs/Imgur.php",
        ),
    ),

    'cdn' => (object) array(
        'css' => (object) array(
            'materialize' => (object) array(
                'library' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/css/materialize.css",
                'icons' => "https://fonts.googleapis.com/icon?family=Material+Icons",
            ),

            'main' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/css/style.css",
            'simplemde' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/css/simplemde.css",
            'imgur' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/css/imgur.css",
        ),

        'js' => (object) array(
            'materialize' => (object) array(
                'library' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/js/materialize.js",
                'init' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/js/materialize_init.js",
            ),

            'particle' => (object) array(
                'library' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/js/particles.js",
                'init' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/js/particles_init.js",
            ),

            'simplemde' => (object) array(
                'library' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/js/simplemde.js",
                'init' => 'https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/js/simplemde_init.js',
            ),

            'ajax' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/js/ajax.js",
            'admin' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/js/admin.js",
        ),

        'images' => (object) array(
            'icons' => (object) array(
                '72x72' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-72x72.png",
                '96x96' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-96x96.png",
                '128x128' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-128x128.png",
                '144x144' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-144x144.png",
                '152x152' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-512x512.png",
                '192x192' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-192x192.png",
                '384x384' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-384x384.png",
                '512x512' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/icons/icon-512x512.png",
            ),

            'logo' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/hbl/images/logo.png",
            'default_profile' => "https://betaplus.ams3.cdn.digitaloceanspaces.com/general/images/default_profile.png",
        ),
    ),
);
