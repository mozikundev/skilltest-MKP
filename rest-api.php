<?php
require_once 'conn.php';
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

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Data Creation API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jwt = $_SERVER['HTTP_AUTHORIZATION'] ?? ''; // Retrieve the JWT token from the header

    if (!empty($jwt)) {
        // Validate the JWT token
        $tokenData = validateToken($jwt);

        if ($tokenData) {
            // Token is valid, create data here
            $data = json_decode(file_get_contents("php://input"));
            $nama_gate = $data['nama_gate'];
            $gate_status = $data['gate_status'];

            $sql = "INSERT INTO Gate (id, nama_gate, gate_status) VALUES (null, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $nama_gate, $gate_status);

            // Execute the insert query
            if ($stmt->execute()) {
              http_response_code(201); // 201 Created
              echo json_encode(array("message" => "Data created successfully"));
            } else {
              http_response_code(500); // 500 Error
              echo json_encode(array("message" => "Something went error"));
            }
        } else {
            http_response_code(401); // 401 Unauthorized
            echo json_encode(array("message" => "Unauthorized. Invalid token."));
        }
    } else {
        http_response_code(401); // 401 Unauthorized
        echo json_encode(array("message" => "Unauthorized. Token not provided."));
    }
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();