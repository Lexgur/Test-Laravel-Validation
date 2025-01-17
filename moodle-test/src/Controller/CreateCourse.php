<?php

namespace Moodle\Controller;

use Moodle\Template;
use PDO;

class CreateCourse
{
    public function __construct(
        private PDO      $connection,
        private Template $template,
    )
    {

    }

    public function __invoke(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $validates = $this->validate();
            $saves = $this->save();

            if ($validates && $saves) {
                $this->template->render(__DIR__ . '/../../templates/create_course_form.php', [
                    'success' => 'Course has been created!'
                ]);
            } else {
                $this->template->render(__DIR__ . '/../../templates/create_course_form.php', [
                    'error' => 'Course failed to create'
                ]);
            }
        } else {
            $this->template->render(__DIR__ . '/../../templates/create_course_form.php');
        }

    }

    public function validate(): bool
    {

        if (empty($_POST['course_name']) || !is_string($_POST['course_name'])) {
            return false;
        }
        if (empty($_POST['course_desc']) || !is_string($_POST['course_desc'])) {
            return false;
        }
        return true;
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $statement = $this->connection->prepare('INSERT INTO `courses` (`id`, `course_name`, `course_desc`) VALUES (:id, :course_name, :course_desc)');
        $statement->bindValue(':id', $_POST['id']);
        $statement->bindValue(':course_name', $_POST['course_name']);
        $statement->bindValue(':course_desc', $_POST['course_desc']);

        $result = $statement->execute();

        return $result;

    }
}