<?php
// Step 1: Connect to the database
$servername = "sql6.freesqldatabase.com";
$username = "sql6695773";
$password = "7wcDt5kpey";
$database = "sql6695773";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle incoming data
$data = json_decode($_POST["data"]);

// Step 3: Insert data into the database
$stmt = $conn->prepare("INSERT INTO coba (data) VALUES (?)");
$stmt->bind_param("s", $data->data); // Assuming 'data' is a string
$stmt->execute();

// Step 4: Fetch the inserted data and return as JSON
$insertedId = $stmt->insert_id;
$selectStmt = $conn->prepare("SELECT * FROM coba WHERE id = ?");
$selectStmt->bind_param("i", $insertedId);
$selectStmt->execute();
$result = $selectStmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row); // Send back the inserted row as JSON
} else {
    echo json_encode(["error" => "No data found"]); // In case of no data found
}

// Step 5: Close connections
$stmt->close();
$selectStmt->close();
$conn->close();
?>
