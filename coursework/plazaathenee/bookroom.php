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
    if(!$conn){
        die ("Connection failed:" .mysqli_connect_error());
    }
 
    // Get form data
    $customername = $_POST['customername'];
    $customercontact = $_POST['customercontact'];
    $customernic = $_POST['customernic'];
    $roomnum = $_POST['roomnum'];
    $roomtype = $_POST['roomtype'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Insert data into plazaroombook table
    $sql = "INSERT INTO plazaroombook (customername, customercontact, customernic, roomnum, roomtype, checkin, checkout) 
        VALUES ('$customername', '$customercontact', '$customernic', $roomnum, '$roomtype', '$checkin', '$checkout')";

    //execute query
    $result = mysqli_query($conn, $sql);

    //check if query executed
    if($result == TRUE){
        echo "New record created successfullly.";
        echo "<br>";
        echo "<br>";
        echo "<a href = 'bookroom.html'>Book Room</a>";
    }
    else{
        echo "error:" . $sql . "<br>" .mysqli_error($conn);
    }
?>
