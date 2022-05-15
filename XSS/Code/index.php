<html>

<head>
</head>

<body>
  <form action="index.php" method="GET">
    <label for="search">Enter username </label>
    <input type="text" id="username" name="username" style="width: 1000px;"><br>
    <input type="submit" value="Search">
  </form>
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'sqli') or die(mysqli_error($conn));
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username']) && !empty($_GET['username'])) {

    $username = test_input($_GET['username']);

    $sql = "SELECT * FROM account WHERE username = '$username'";
    echo "Query: " . $sql . "<br>";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
      echo "===================================<br>";
      echo "Username: " . $row["username"] . "<br>";
      echo "Password: " . $row["password"] . "<br>";
      echo "Email: " . $row["email"] . "<br>";
      $i++;
    }
    if ($i == 0) {
      echo "===================================<br>";
      echo "User " . $username . " isn't exist in database";
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
</body>

</html>