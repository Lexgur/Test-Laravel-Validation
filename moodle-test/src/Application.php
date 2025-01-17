<?php

declare(strict_types=1);

namespace Moodle;

use Moodle\Controller\AssignUserToCourse;
use Moodle\Controller\CreateCourse;
use Moodle\Controller\CreateUser;
use Moodle\Controller\ViewUsers;

class Application
{

    private Connection $connection;

    private array $actions = [
        'create_user' => CreateUser::class,
        'create_course' => CreateCourse::class,
        'view_users' => ViewUsers::class,
        'assign_course' => AssignUserToCourse::class,
    ];

    public function __construct()
    {

    }

    public function run(): void
    {
        global $config;
        $configPath = __DIR__ . '/../config.php';
        $config = include $configPath;

        //lets run
        $dbconfig = $config['db'];
        $dsn = 'mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['database'];
        $this->connection = new Connection($dsn, $dbconfig['user'], $dbconfig['password']);
        $connection = $this->connection->connect();
        $template = new Template();
        $request = filter_var_array($_GET, ['action' => FILTER_SANITIZE_ENCODED]);
        $controller = $this->actions[$request['action']];
        $controller = new $controller($connection, $template);
        $controller();
    }

}