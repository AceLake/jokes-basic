<html>
<head>

</head>
 <?php
 session_start();
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 
include "db_connect.php";

$username = $_POST['user_name'];
$password = $_POST['password'];

echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";

$stmt = $mysqli->prepare ("SELECT user_id, user_name, password FROM users WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$stmt->store_result();
$stmt->bind_result($userid, $fetched_name, $fetched_pass);

if ($stmt->num_rows == 1 ) {
    echo "Found 1 person with that username<br>";
    $stmt->fetch();
    if (password_verify($password, $fetched_pass)) {
        echo " pw matches<br>";
        echo "<p>Login success</p>"; 
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
    }
    else {
        echo "<p>Login success</p>"; 
    }
    

} else {
    echo "0 results. Not logged in<br>";
    $_SESSION =  [];
    session_destroy();
}
echo "Session variable = ";
print_r($_SESSION);

echo "<br>";

echo "<a href='index.php'>Return to main page</a>";
?>

</html>
