<?php

declare(strict_types=1);

namespace Moodle\Controller;

use Moodle\Template;
use PDO;

class AssignUserToCourse
{
    public function __construct(
        private PDO      $connection,
        private Template $template,
    )
    {
    }

    public function __invoke(): void
    {
        $users = $this->getUsers();
        $courses = $this->getCourses();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validates = $this->validate();
            $saves = $this->save();

            $this->template->render(__DIR__ . '/../../templates/assign_course_form.php', [
                'success' => $saves ? 'User successfully assigned to course!' : '',
                'error' => !$saves ? 'Failed to assign user to course!' : '',
                'users' => $users,
                'courses' => $courses,
            ]);
        } else {
            $this->template->render(__DIR__ . '/../../templates/assign_course_form.php', [
                'users' => $users,
                'courses' => $courses,
            ]);
        }
    }

    private function getUsers(): array
    {
        $query = 'SELECT id, username FROM users';
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getCourses(): array
    {
        $query = 'SELECT id, course_name FROM courses';
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validate(): bool
    {
        return isset($_POST['user_id'], $_POST['course_id'], $_POST['progress'], $_POST['status']);
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $statement = $this->connection->prepare('
            INSERT INTO `usercourses` (`user_id`, `course_id`, `progress`, `status`) 
            VALUES (:user_id, :course_id, :progress, :status)
        ');

        $statement->bindValue(':user_id', $_POST['user_id']);
        $statement->bindValue(':course_id', $_POST['course_id']);
        $statement->bindValue(':progress', $_POST['progress']);
        $statement->bindValue(':status', $_POST['status']);

        return $statement->execute();
    }
}