<?php

use src\Models\Database;
use src\Models\User;
use src\Repository\UserRepository;

if (!empty(file_get_contents('php://input'))) {
    $data = file_get_contents('php://input');
    $user = (json_decode($data, true));



    if (!empty($user['Name']) && !empty($user['LastName']) && !empty($user['Email']) && !empty($user['password']) && !empty($user['password2']) && isset($user['Name']) && isset($user['LastName']) && isset($user['Email']) && isset($user['password']) && isset($user['password2'])) {
        $LastName = htmlentities($user['LastName']);
        $Name = htmlentities($user['Name']);

        if ($user['password'] === $user['password2']) {
            if (strlen($user['password']) >= 8) {
                $password = password_hash($user['password'], PASSWORD_DEFAULT);
            } else {
                exit;
            }
        } else {
            exit;
        }


        if (filter_var($user['Email'], FILTER_VALIDATE_EMAIL)) {
            $Email = htmlentities($user['Email']);
        } else {
            exit;
        }

        // action finale

        $Data_base = new Database();
        $user = new User($user);
        $UserRepositori = new UserRepository();
        $UserRepositori->CreateThisUser($user);
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
    }
}
