


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link active">View Users</a>
            </li>
        </ul>
    </nav>
    <div class="container">
<form action="users.php" method="post">
    <input type="submit" name="someAction" value="Refresh Page" />
</form>

        <div class="row">
            <h2>Users</h2>
	<table width="100%" border="1">
            <thead>
                <tr>
                    <td>UserID</td>
                    <td>RFID</td>
                    <td>Name</td>
                    <td>Date Added</td>
                </tr>
            </thead>
		<?php
        $servername = "";
$username = "";
$password = "";
$database = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
          	$sql = "SELECT id, rfid_uid, name, created FROM users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"]. "</td><td>" . $row["rfid_uid"] . "</td><td>"
				. $row["name"]. "</td><td>" . $row["created"] . "</td></tr>";
			}
			echo "</table>";
			} else { echo "0 results"; }
		$conn->close();
		?>

        </div>
      
    </div>

</body>

</html>

	

             




