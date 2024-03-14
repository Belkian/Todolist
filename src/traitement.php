<?php

if (!empty(file_get_contents('/../Public/JS/script.js'))) {
    $data = file_get_contents('/../Public/JS/script.js');
    $user = (json_decode($data, true));



    if (!empty($_POST['Name']) && !empty($_POST['LastName']) && !empty($_POST['Email']) && !empty($_POST['password']) && !empty($_POST['password2']) && isset($_POST['Name']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['password']) && isset($_POST['password2'])) {
        $LastName = htmlentities($_POST['LastName']);
        $Name = htmlentities($_POST['Name']);

        if ($_POST['password'] === $_POST['password2']) {
            if (strlen($_POST['password']) >= 8) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                exit;
            }
        } else {
            exit;
        }


        if (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $Email = htmlentities($_POST['Email']);
        } else {
            exit;
        }

        // action finale

        $Data_base = new Database();
        $User = new UserRepository();
        $User->CreateThisUser();
        header('Content-Type: application/json');
        echo json_encode($User);
    } else {
    }
}
