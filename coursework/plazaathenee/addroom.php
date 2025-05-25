<?php
    session_start(); // Start the session

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

    $roomnum = $_POST['txtrnumber']; //retrive room number
    $roomtype = $_POST['roomtype']; //retrive roomtype
    $pricepernight = $_POST['txtppnight']; //retrive price per night

    //insert the data to the table
    $sql = "INSERT INTO plazarooms (roomnum, roomtype, pricepernight) VALUES ($roomnum, '$roomtype', $pricepernight)";
    
    //execute the sql query
    if(mysqli_query($conn, $sql)){
        echo "New record created successfullly.";
        echo "<br>";
        echo "<br>";
        echo "<a href = 'addroom.html'>Add Room</a>";
    }
    else{
        echo "error:" . $sql . "<br>" .mysqli_error($conn);
    }

    mysqli_close($conn); //close database connection
?>