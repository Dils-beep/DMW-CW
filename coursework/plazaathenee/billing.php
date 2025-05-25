<?php
session_start(); // Start the session

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plazaathenee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data
$customerName = $_POST['txtrcustName'];
$roomtype = $_POST['roomtype'];
$nightspent = $_POST['txtnoOfnight'];
$additionalservice = 0; // Default value

if (isset($_POST['breakfast'])) {
    $additionalservice += 20; // Breakfast value
}
if (isset($_POST['lunch'])) {
    $additionalservice += 30; // Lunch value
}
if (isset($_POST['dinner'])) {
    $additionalservice += 40; // Dinner value
}

$tax = isset($_POST['txttax']) ? $_POST['txttax'] : 10; // Default 10%
$discount = isset($_POST['txtdiscount']) ? $_POST['txtdiscount'] : 0; // Default 0%

// Calculate total bill
$pricePerNight = floatval($roomtype); // Price from roomtype value
$subtotal = $pricePerNight * $nightspent + $additionalservice;
$taxAmount = $subtotal * ($tax / 100);
$discountAmount = $subtotal * ($discount / 100);
$totalBill = $subtotal + $taxAmount - $discountAmount;

// SQL query to insert data
$sql = "INSERT INTO plazaroombill (roomtype, pricepernight, nightspent, additionalsservice, tax, discount, totalbill) 
        VALUES ('$roomtype', '$roomtype', $nightspent, $additionalservice, $tax, $discount, $totalBill)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully.";
    echo "<br><br>";
    echo "<a href='billing.html'>Add Another Bill</a>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>