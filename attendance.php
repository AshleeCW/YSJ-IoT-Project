
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Attendance System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Attendance System</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link active">View Attendance</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link">View Users</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Attendance</h2>
<form action="attendance.php" method="post">
    <input type="submit" name="someAction" value="Refresh List" />
</form>
	<table width="100%" border="1">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User ID</td>
                    <td>Sign in</td>
                   
                </tr>
            </thead>
		<?php
        $servername = "cs2s.yorkdc.net";
$username = "ashlee.w";
$password = "X9GQ3STN";
$database = "ashleewilliamson_attend";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
          	$sql = "SELECT id, user_id, sign_in FROM attendance";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_id"] . "</td><td>"
				. $row["sign_in"]. "</td></tr>";
			}
			echo "</table>";
			} else { echo "0 results"; }
		$conn->close();
		?>
   
    </div>
</html>





