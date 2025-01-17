<?php

declare(strict_types=1);

namespace Moodle\Controller;

use Moodle\Template;
use PDO;

class ViewUsers
{
    public function __construct(
        private PDO      $connection,
        private Template $template,
    )
    {
    }

    public function __invoke(): void
    {
        // SQL query to get users with their courses, progress, and status
        $query = "
    SELECT 
        u.id AS user_id, 
        u.username, 
        u.email,
        c.course_name,
        uc.progress,
        uc.status
    FROM users u
    LEFT JOIN usercourses uc ON u.id = uc.user_id
    LEFT JOIN courses c ON c.id = uc.course_id
";
        $stmt = $this->connection->query($query);
        $usersCourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($usersCourses) {
            $this->template->render(__DIR__ . '/../../templates/view_users.php', [
                'usersCourses' => $usersCourses
            ]);
        } else {
            $this->template->render(__DIR__ . '/../../templates/view_users.php', [
                'usersCourses' => []
            ]);
        }
    }
}