<?php

$host = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'pharmacy';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // Define the SQL query
    $query = "INSERT INTO Patient (First_Name, Last_Name, Date_of_Birth, Address_patient, Phone, Email) 
              VALUES ('$firstName', '$lastName', '$dob', '$address', '$phone', '$email')";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
