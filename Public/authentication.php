<?php
include("./../src/autoload.php");

use src\Models\Database;
use src\Models\User;
use src\Repository\UserRepository;

if (!empty(file_get_contents('php://input'))) {
    $data = file_get_contents('php://input');
    $user = json_decode($data, true);

    $UserRepository = new UserRepository();
    $Data_base = new Database();
    $UserRepository->ConnectThisUser($user['Email'], $user['password']);

    header('Content-Type: application/json');
    echo json_encode($user);
}
