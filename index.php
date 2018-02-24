<?php

require __DIR__ . '/vendor/autoload.php';

use Pimple\Container;

$container = new Container();

require __DIR__ . '/config/config.php';
require __DIR__ . '/config/services.php';

$container['harvester']->emailFriends();
