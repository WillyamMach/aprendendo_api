|<?php 
    header("Content-Type: application/json");

    $users = [
        [
            "id" => 0,
            "username" => "Willyam",
            "password" => "123" 
        ],
        [
            "id" => 1,
            "username" => "Cesar",
            "password" => "123" 
        ],
        [
            "id" => 2,
            "username" => "Marcos",
            "password" => "123" 
        ]
    ];

    echo json_encode($users);

    $data = json_decode(file_get_contents("php://input"), true);

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($data['username']) && isset($data['password'])) {
            $username = $data['username'];
            $password = $data['password'];

            for($i = 0; $i < count($users); $i++) {
                if($users[$i]['username'] == $username && $users[$i]['password'] == $password) {
                    echo json_encode([
                        'status' => 'success',
                        'mensage' => 'Login successful'
                    ]);
                } else {
                    echo json_encode(['status' => 'Error', 'mensage' => 'User or passoword invalid']);
                }
            }
        }
    }

    // montar a resposta