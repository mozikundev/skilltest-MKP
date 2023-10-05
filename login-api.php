<?php
require_once 'conn.php';
require_once 'vendor/autoload.php'; // Include JWT library
use Firebase\JWT\JWT;

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data (username and password)
$data = json_decode(file_get_contents("php://input"));

// Check if both username and password were provided
if (!empty($data->username) && !empty($data->password)) {
    $username = $data->username;
    $password = $data->password;

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify the provided password with the stored password hash
        if (password_verify($password, $storedPassword)) {
            // Generate a JWT token
            $secretKey = 'your_secret_key'; // Change this to a secure secret key
            $tokenPayload = array(
                "username" => $username,
                // You can add more data to the payload as needed
            );
            $jwt = JWT::encode($tokenPayload, $secretKey);

            // Return the JWT token as JSON
            http_response_code(200);
            echo json_encode(array("message" => "Login successful", "token" => $jwt));
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Login failed. Invalid password"));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Login failed. User not found"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Invalid input data"));
}