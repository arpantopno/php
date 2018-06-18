<!Doctype HTML>
<html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";
	$conn = new mysqli($server, $username, $password, $dbname);
	if ($result = $mysqli->query("SHOW TABLES LIKE 'user'")) {
		if($result->num_rows == 1) {
		$sql = "CREATE TABLE user (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(40) NOT NULL,
		dob DATE() NOT NULL,
		address VARCHAR(150) NOT NULL,
		email VARCHAR(80) NOT NULL)";
		$conn->query($sql);
		}
	}
	$stmt = $conn->$prepare("INSERT INTO user (name, dob, address, email) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss", $name, $dob, $address, $email);
	$name = $_POST["name"];
	$dob = $_POST["date"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$stmt->execute();
	$stmt->close();
	$conn->close();
}
?>
</html>
