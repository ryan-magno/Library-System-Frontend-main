<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Login Page</title>

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./login-pop-up.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" />
</head>
<body>
    <div class="login-pop-up">
        <div class="bottom-red"></div>
        <div class="top-red"></div>
        <div class="logo3">
            <img class="logo-icon" alt="" src="./public/logo@2x.png" />
            <div class="school-name">Sacred Heart of Jesus Catholic School</div>
            <div class="library-system2">LIBRARY SYSTEM</div>
            <b class="system">Learning Resource Center</b>
        </div>
        <form method="post">
            <b class="id">ID</b>
            <input class="id-input" type="text" name="userId" placeholder="Type here..." required />

            <b class="password">Password</b>
            <input class="password1" type="password" name="userPassword" placeholder="Type here..." required />

            <button type="submit" class="log-in4" id="popuplogInContainer">
                <div class="log-in-inner"></div>
                <div class="log-in5">LOG IN</div>
            </button>
        </form>
    </div>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost"; // Server name
        $username = "root"; // Default username for XAMPP
        $password = ""; // Default password for XAMPP
        $database = "school_library"; // Your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to sanitize user input to prevent SQL injection
        function sanitize_input($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        // Sanitize and store the user input
        $userId = sanitize_input($_POST["userId"]);
        $userPassword = sanitize_input($_POST["userPassword"]);

        // SQL query to check if user credentials are valid
        $sql = "SELECT * FROM librarians WHERE librarian_id = '$userId' AND password = '$userPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // User authenticated successfully
            header("Location: admin.php");
            exit;
        } else {
            // Invalid credentials
            echo "<script>alert('Invalid username or password!');</script>";
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>
