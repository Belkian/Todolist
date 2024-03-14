<?php
if (!empty(file_get_contents('php://input'))) {
    $mdp = password_hash(file_get_contents('php://input'), PASSWORD_DEFAULT);

    header('Content-Type: application/json');
    echo json_encode($mdp);
}
