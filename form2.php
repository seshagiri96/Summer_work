<?php

$email = $_POST['email'];
$message = $_POST['user_message'];

echo "Form Successfully Submitted by<br>";
echo $_POST['email']."<br>";
echo $_POST['user_message']."<br>";

$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>"; 
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

$VALUES = "(".$email.",".$message.")";
$instr = "INSERT INTO `comments` (`email`,`message`) VALUES ('$email','$message')";
echo $instr."<br>";

//$conn->exec($instr);

//$instr = "SELECT * FROM comments";

if($conn->exec($instr)){
	echo "Query Successful<br>";
}else {
	echo "Query unsuccessful<br>";
}
echo "<-- End -->";

$conn = null;
?>