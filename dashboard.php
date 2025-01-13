<?php

$host = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'pharmacy';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$patient_sql = "SELECT * FROM Patient";
$patient_result = $conn->query($patient_sql);


$doctor_sql = "SELECT * FROM Doctor";
$doctor_result = $conn->query($doctor_sql);


$pharmacist_sql = "SELECT * FROM Pharmacist";
$pharmacist_result = $conn->query($pharmacist_sql);


$product_sql = "SELECT * FROM Product";
$product_result = $conn->query($product_sql);


$medication_sql = "SELECT * FROM Medication";
$medication_result = $conn->query($medication_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<h1>Pharmacy Dashboard</h1>


<h2>Patients</h2>
<table border="1">
    <tr>
        <th>Patient ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
    </tr>
    <?php
    if ($patient_result->num_rows > 0) {
        while($row = $patient_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Patient_ID'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['Date_of_Birth'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Address_patient'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No patients found</td></tr>";
    }
    ?>
</table>


<h2>Doctors</h2>
<table border="1">
    <tr>
        <th>Doctor ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <th>Clinic Address</th>
        <th>Phone</th>
    </tr>
    <?php
    if ($doctor_result->num_rows > 0) {
        while($row = $doctor_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Doctor_ID'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['Specialty'] . "</td>";
            echo "<td>" . $row['Clinic_Address'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No doctors found</td></tr>";
    }
    ?>
</table>


<h2>Pharmacists</h2>
<table border="1">
    <tr>
        <th>Pharmacist ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Hire Date</th>
    </tr>
    <?php
    if ($pharmacist_result->num_rows > 0) {
        while($row = $pharmacist_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Pharmacist_ID'] . "</td>";
            echo "<td>" . $row['First_Name'] . "</td>";
            echo "<td>" . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['Position'] . "</td>";
            echo "<td>" . $row['Salary'] . "</td>";
            echo "<td>" . $row['Hire_Date'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No pharmacists found</td></tr>";
    }
    ?>
</table>


<h2>Products</h2>
<table border="1">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
    <?php
    if ($product_result->num_rows > 0) {
        while($row = $product_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Product_ID'] . "</td>";
            echo "<td>" . $row['Name_pro'] . "</td>";
            echo "<td>" . $row['Brand'] . "</td>";
            echo "<td>" . $row['Description_pro'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Category'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No products found</td></tr>";
    }
    ?>
</table>


<h2>Medications</h2>
<table border="1">
    <tr>
        <th>Medication Name</th>
        <th>Scientific Formula</th>
        <th>Type</th>
        <th>Stock Quantity</th>
        <th>Price</th>
        <th>Reimbursement Rate</th>
        <th>Chronic Status</th>
        <th>Therapeutic Category</th>
    </tr>
    <?php
    if ($medication_result->num_rows > 0) {
        while($row = $medication_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Medication_Name'] . "</td>";
            echo "<td>" . $row['Scientific_Formula'] . "</td>";
            echo "<td>" . $row['Type_med'] . "</td>";
            echo "<td>" . $row['Stock_Quantity'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Reimbursement_Rate'] . "</td>";
            echo "<td>" . $row['Chronic_Status'] . "</td>";
            echo "<td>" . $row['Therapeutic_Category'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No medications found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
