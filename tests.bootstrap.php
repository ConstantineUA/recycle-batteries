<?php

require __DIR__ . '/vendor/autoload.php';

if ($_ENV['PREPARE_DB']) {
    passthru('bin/console doctrine:schema:drop --force --env=test');
    passthru('bin/console doctrine:schema:create --env=test');
}
