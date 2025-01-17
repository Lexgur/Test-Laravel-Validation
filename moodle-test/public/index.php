<?php

declare(strict_types=1);

require_once __DIR__ . '/../autoload.php';

use Moodle\Application;

$application = new Application();
$application->run();