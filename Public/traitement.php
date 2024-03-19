<?php
include("./../src/autoload.php");

use src\Models\Database;
use src\Models\User;
use src\Repository\TaskRepository;
use src\Repository\UserRepository;

if (!empty(file_get_contents('php://input'))) {
    $data = file_get_contents('php://input');

    $user = json_decode($data, true);


    if (!empty($user['Name']) && !empty($user['LastName']) && !empty($user['password']) && !empty($user['password2']) && !empty($user['Email'])) {
        $user['LastName'] = htmlentities($user['LastName']);
        $user['Name'] = htmlentities($user['Name']);



        if ($user['password'] === $user['password2']) {
            unset($user['password2']);
            if (strlen($user['password']) >= 8) {
                $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            } else {
                exit;
            }
        } else {
            exit;
        }

        if (filter_var($user['Email'], FILTER_VALIDATE_EMAIL)) {
            $user['Email'] = htmlentities($user['Email']);
        } else {
            exit;
        }

        $User = new User($user);
        $UserRepository = new UserRepository();
        $Data_base = new Database();
        // action finale
        $UserRepository->CreateThisUser($User);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'You are  register you can now sign in.']);
    }

    if (!empty($user['taskName']) && !empty($user['priority']) && !empty($user['category'])) {
        $Data_base = new Database();
        $TaskRepository = new TaskRepository();

        $TaskRepository->CreateThisTask($user['taskName'], $user['priority'], $user['category']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['message' => 'An error as occur.']);
}
