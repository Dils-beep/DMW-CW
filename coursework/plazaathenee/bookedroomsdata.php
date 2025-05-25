<html>
    <head>
        <title>Booked Room|Plaza Athenee</title>

        <link rel = "stylesheet" type = "text/css" href = "design.css">
        <link rel="icon" href="plazalogo.png" type="image/x-icon">
    </head>

    <body>
        <header>
            <h1> <img src = "plazalogo.png">PLAZA ATHENEE</h1>
            <h4>Paris, France</h4>
        </header>
          
        <section>
            <div class = "topnav">
                <a href = "home.html">Home</a>
                <a href = "addroom.html">Add Room</a>
                <a href = "updateroom.html">Update Room</a>
                <a href = "deleteroom.html">Delete Room</a>
                <a href = "bookroom.html">Book Room</a>
                <a href = "billing.html">Billing</a>
                <a class = "active" href = "bookedrooms.html">Booked Rooms</a>
            </div>
        </section>

        <br><br>

        <div class = "container">

            <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "plazaathenee";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch data
                $sql = "SELECT customername, customercontact, roomnum, checkin, checkout FROM plazaroombook";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Start HTML table
                    echo "<table border='1'>
                        <tr>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Room Number</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                        </tr>";

                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["customername"] . "</td>
                            <td>" . $row["customercontact"] . "</td>
                            <td>" . $row["roomnum"] . "</td>
                            <td>" . $row["checkin"] . "</td>
                            <td>" . $row["checkout"] . "</td>
                        </tr>";
                    }

                    echo "</table>"; //end table
                } 
                else {
                    echo "0 results";
                }

                // Close the connection
                $conn->close();
            ?>
        </div>

        <footer>
            <p class = "footer"><b>25 Av. Montaigne, 75008 Paris, France</b>
            <br><br>
            <b>Find Us: </b> 
            <br><br>
            <b>Instagram</b><a class = "link" href ="https://www.instagram.com/plaza_athenee/">  Hôtel Plaza Athénée</a></p>
          </footer>
    </body>
</html>