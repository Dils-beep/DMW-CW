<?php
    session_start(); // Start the session

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "plazaathenee";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die ("Connection failed:" .mysqli_connect_error());
    }

    $roomnum = $_POST['txtrnumber'];
    $roomtype = $_POST['roomtype'];
    $pricepernight = $_POST['txtppnight'];

    // Check if the room number exists
    $checksql = "SELECT * FROM plazarooms WHERE roomnum = $roomnum";
    $result = mysqli_query($conn, $checksql);

    if(mysqli_num_rows($result) > 0) {
        // Room number exists, proceed with update
        $updatesql = "UPDATE plazarooms
                      SET roomtype = '$roomtype', pricepernight = $pricepernight
                      WHERE roomnum = $roomnum";

        if(mysqli_query($conn, $updatesql)){
            echo "Room Updated successfully.";
            echo "<br>";
            echo "<br>";
            echo "<a href = 'updateroom.html'>Update Room</a>";
        } 
        else {
            echo "Error updating room.";
        }
    } 
    else {
        // Room number doesn't exist
        echo "Room number not available.";
    }

    mysqli_close($conn);
?>

