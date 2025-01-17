<?php

namespace Moodle\Controller;

use Moodle\Template;
use PDO;

class CreateUser
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
                $this->template->render(__DIR__ . '/../../templates/create_user_form.php', [
                    'success' => 'User creation success!'
                ]);
            } else {
                $this->template->render(__DIR__ . '/../../templates/create_user_form.php', [
                    'error' => 'User creation failed!'
                ]);
            }
        } else {
            $this->template->render(__DIR__ . '/../../templates/create_user_form.php');
        }

    }

    public function validate(): bool
    {

        if (empty($_POST['username']) || !is_string($_POST['username'])) {
            return false;
        }
        if (empty($_POST['email']) || !is_string($_POST['email'])) {
            return false;
        }

        return true;
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        // Prepare the INSERT statement, removing the create_time field
        $statement = $this->connection->prepare('INSERT INTO `users` (`id`, `username`, `email`) VALUES (:id, :username, :email)');
        $statement->bindValue(':id', $_POST['id']);
        $statement->bindValue(':username', $_POST['username']);
        $statement->bindValue(':email', $_POST['email']);

        $result = $statement->execute();

        return $result;
    }

}


