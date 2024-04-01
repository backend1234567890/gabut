<?php
// Retrieve processed data from POST request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['data'])) {
    $jsonData = json_encode($data['data']); // Encode 'data' to JSON string
    
    // Example: Connect to your database and insert the data
    $servername = "sql6.freesqldatabase.com";
    $username = "sql6695773";
    $password = "7wcDt5kpey";
    $database = "sql6695773";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO coba (data) VALUES (?)"); // Insert into 'newcoba' table, 'data' column
        $stmt->bind_param("s", $jsonData);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            echo "Data posted successfully!";
        } else {
            echo "Error posting data: " . $conn->error;
        }
        
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Data 'data' not found";
}
?>
