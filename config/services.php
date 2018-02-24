<?php

use Example\Mailer\Harvester;
use Example\Mailer\SmtpMailer;

$container['mailer'] = function ($c) {
    return new SmtpMailer($c['hostname'], $c['user'], $c['pass'], $c['port']);
};
$container['pdo'] = function ($c) {
    return new \PDO("pgsql:dbname={$c['dbname']};host={$c['dbhost']}", $c['dbuser'], $c['dbpassword']);
};
$container['harvester'] = function ($c) {
    return new Harvester($c['pdo'], $c['mailer']);
};