<?php
require_once 'vendor/autoload.php'; // Include JWT library
use Firebase\JWT\JWT;

// Your secret key for JWT
$secretKey = 'your_secret_key';

function validateToken($jwt) {
    global $secretKey;

    try {
        $decoded = JWT::decode($jwt, $secretKey, array('HS256'));
        return $decoded;
    } catch (Exception $e) {
        return false; // Token is invalid
    }
}

// Data Creation API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jwt = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Retrieve the JWT token from the header

    if (!empty($jwt)) {
        // Validate the JWT token
        $tokenData = validateToken($jwt);

        if ($tokenData) {
            // Token is valid, create data here
            // Example: Insert data into a database
            $data = json_decode(file_get_contents("php://input"));
            // Perform data insertion or other actions here

            http_response_code(201); // 201 Created
            echo json_encode(array("message" => "Data created successfully"));
        } else {
            http_response_code(401); // 401 Unauthorized
            echo json_encode(array("message" => "Unauthorized. Invalid token."));
        }
    } else {
        http_response_code(401); // 401 Unauthorized
        echo json_encode(array("message" => "Unauthorized. Token not provided."));
    }
}