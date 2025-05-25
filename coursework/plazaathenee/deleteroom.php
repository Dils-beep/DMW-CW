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
        die ("Connection failed: " . mysqli_connect_error());
    }

    $roomnum = isset($_POST['txtrnumber']) ? intval($_POST['txtrnumber']) : 0;

    if($roomnum <= 0) {
        die("Invalid room number.");
    }

    // Check if the room number exists
    $checksql = "SELECT * FROM plazarooms WHERE roomnum = ?";

    $stmt = $conn->prepare($checksql); //prepare sql statement
    $stmt->bind_param("i", $roomnum); //binds roomnum as an integer
    $stmt->execute(); //execute query
    $result = $stmt->get_result(); //fetch result

    if(mysqli_num_rows($result) > 0) {
        // Check if there are any bookings for the room
        $bookingCheckSql = "SELECT * FROM plazaroombook WHERE roomnum = ?";
        $bookingStmt = $conn->prepare($bookingCheckSql);
        $bookingStmt->bind_param("i", $roomnum);
        $bookingStmt->execute();
        $bookingResult = $bookingStmt->get_result();

        if(mysqli_num_rows($bookingResult) > 0) {
            // There are bookings, cannot delete room
            echo "This room has bookings and cannot be deleted.";
        } 
        else {
            // Room number exists, no bookings, proceed with deletion
            $deletesql = "DELETE FROM plazarooms WHERE roomnum = ?";
            $deleteStmt = $conn->prepare($deletesql);
            $deleteStmt->bind_param("i", $roomnum);

            //execute the deletion query
            if($deleteStmt->execute()){
                echo "Room Deleted successfully.";
                echo "<br>";
                echo "<br>";
                echo "<a href='deleteroom.html'>Delete Another Room</a>";
            } 
            else {
                echo "Error deleting room: " . $conn->error;
            }
        }
    } 
    else {
        // Room number doesn't exist
        echo "Room number not available.";
    }

    mysqli_close($conn);
?>
