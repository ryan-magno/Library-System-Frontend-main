<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitize_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    $userId = sanitize_input($_POST["userId"]);
    $userPassword = sanitize_input($_POST["userPassword"]);

    $stmt = $conn->prepare("SELECT * FROM librarians WHERE librarian_id = ? AND password = ?");
    $stmt->bind_param("ss", $userId, $userPassword);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['userId'] = $userId;
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" />
</head>
<body>
    <div class="login-pop-up">
        <!-- Display error message if login fails -->
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
</body>
</html>
