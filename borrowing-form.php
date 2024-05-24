<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./borrowing-form.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" />
</head>
<body>
  <div class="borrowing-form">
    <div class="frame1">
      <div class="frame-child"></div>
    </div>

    <div class="borrowing-form1">BORROWING FORM</div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="lrn">
        <img class="shape-icon" alt="" src="./public/shape.svg" />
        <div class="lrn1">Patron ID</div>
        <input class="input" placeholder="Type here..." type="text" name="patronId" />
      </div>
      <div class="first-name">
        <img class="shape-icon" alt="" src="./public/shape.svg" />
        <div class="first-name1">First Name</div>
        <input class="input1" placeholder="Type here..." type="text" name="firstName" />
      </div>
      <div class="last-name">
        <img class="shape-icon" alt="" src="./public/shape.svg" />
        <div class="first-name1">Last Name</div>
        <input class="input2" placeholder="Type here..." type="text" name="lastName" />
      </div>
      <div class="bookid">
        <div class="book-id">
          <div class="book-id1">
            <img class="borrowdate-child" alt="" src="./public/shape.svg" />
            <div class="first-name1">Book ID</div>
            <button class="add-sahpe-parent">
              <img class="add-sahpe-icon" alt="" src="./public/add-sahpe.svg" />
              <div class="add">Add</div>
            </button>
            <input class="input3" placeholder="Type here..." type="text" name="bookId" />
          </div>
        </div>
      </div>
      <!-- Other form fields -->
            <div class="list">
        <div class="borrow-list">
          <div class="borrow-one-parent">
            <div class="borrow-one">
              <div class="borrow-list1">Borrow List</div>
              <img class="shape-icon4" alt="" src="./public/shape.svg" />

              <div class="book-id3">Book ID</div>
              <div class="book-title">Book Title</div>
            </div>
            <div class="borrow-two">
              <img class="shape-icon5" alt="" src="./public/shape.svg" />

              <div class="book-id4">Book ID</div>
              <div class="book-title1">Book Title</div>
            </div>
          </div>
        </div>
      </div>
      <div class="returndate">
        <div class="returndate1">
          <div class="return-date">Return Date</div>
          <div class="borrow-date">
            <img class="borrow-date-child" alt="" src="./public/shape.svg" />

            <button class="frame2">
              <img class="add-sahpe-icon" alt="" src="./public/add-sahpe.svg" />

              <div class="choose">Choose</div>
            </button>
          </div>
        </div>
      </div>
      <div class="borrowdate">
        <div class="first-name1">Borrow Date</div>
        <img class="borrowdate-child" alt="" src="./public/shape.svg" />

        <button class="add-sahpe-parent">
          <img class="add-sahpe-icon" alt="" src="./public/add-sahpe.svg" />

          <div class="choose">Choose</div>
        </button>
      </div>
      <div class="libraryrules">
        <div class="red"></div>
        <div class="white"></div>
        <div class="rules1">
          <ul class="user-must-not-have-overdue-boo1">
            <li class="user-must-not1">User must not have overdue books.</li>
            <li class="user-must-not1">
              There is a set duration that a user may borrow the book.
            </li>
            <li class="user-must-not1">
              Failure to Return a Circulation Book.
            </li>
            <li class="user-must-not1">
              Php 2.00 a day, exclusive of Sundays and holidays.
            </li>
            <li class="user-must-not1">Failure to Return a Reserve Book.</li>
            <li class="user-must-not1">Php 1.00 (first hour)</li>
            <li class="user-must-not1">
              Php 5.00 (Each hour after the first hour)
            </li>
            <li class="user-must-not1">Php 50.00 (Whole day)</li>
            <li class="user-must-not1">
              Withdrawal of a Reserve Book Without Reservation Permit.
            </li>
            <li class="user-must-not1">Php 50.00</li>
            <li class="user-must-not1">
              Failure to Return a General Reference Book and Other Restricted
              Materials Borrowed for Photocopying Purposes.
            </li>
            <li class="user-must-not1">Php 50.00 fine</li>
            <li class="user-must-not1">
              Library privileges suspended for 1 week (second offense)
            </li>
            <li class="user-must-not1">Loss of a Circulation Book</li>
            <li class="user-must-not1">
              Replace it with the same title or good photocopy or pay its
              current replacement value
            </li>
            <li>
              The person shall pay a fine equivalent to 50% of the cost of the
              book
            </li>
          </ul>
        </div>
        <div class="header8">Library Rules</div>
      </div>
      <button class="submit-button" id="submitButton">
      <button type="submit" class="submit-button" id="submitButton" name="submit">
        <div class="submit">Submit</div>
      </button>
    </form>
  </div>

  <div
      id="borrowingFormPopUpPopup"
      class="popup-overlay"
      style="display: none"
    >
      <div class="borrowing-form-pop-up1">
        <div class="logo-group">
          <div class="logo11">
            <img class="logo-icon3" alt="" src="./public/logo@2x.png" />

            <div class="school-name2">
              Sacred Heart of Jesus Catholic School
            </div>
            <div class="library-system7">LIBRARY SYSTEM</div>
            <b class="system2">Learning Resource Center</b>
          </div>
          <div class="container1">
            <div class="message1">
              The book is successfully reserved for you to borrow. You may claim
              it anytime during office hours. Failure to claim within three days
              will lead to forfeiture of the reservation of the book. Scheduled
              return date will be 7 days from now.
            </div>
            <div class="pleasesaveyourreferencecode1">
              Please save your reference code
            </div>
            <b class="referencecode1">20238758900</b>
          </div>
          <button class="submitbutton1" id="popupsubmitButton">
            <img
              class="submitbutton-item"
              alt=""
              src="./public/rectangle-13.svg"
            />

            <div class="proceed1">Proceed</div>
          </button>
        </div>
      </div>
    </div>

    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'db_connect.php';

    // Function to sanitize user input to prevent SQL injection
    function sanitize_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Sanitize and store the form data
    $patronId = isset($_POST["patronId"]) ? sanitize_input($_POST["patronId"]) : "";
    $firstName = isset($_POST["firstName"]) ? sanitize_input($_POST["firstName"]) : "";
    $lastName = isset($_POST["lastName"]) ? sanitize_input($_POST["lastName"]) : "";
    $bookId = isset($_POST["bookId"]) ? sanitize_input($_POST["bookId"]) : "";

    // Check if the patron exists
    $checkPatronQuery = "SELECT * FROM patrons WHERE patron_id = ?";
    $stmt = $conn->prepare($checkPatronQuery);
    $stmt->bind_param("s", $patronId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 0) {
        // Patron does not exist, insert patron details into patrons table
        $insertPatronQuery = "INSERT INTO patrons (patron_id, first_name, last_name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertPatronQuery);
        $stmt->bind_param("sss", $patronId, $firstName, $lastName);
        if ($stmt->execute()) {
            echo "New patron created successfully";
        } else {
            echo "Error inserting patron: " . $stmt->error;
        }
        $stmt->close();
    }

    //SQL query to insert data into borrow_records table
    $borrowQuery = "INSERT INTO borrow_records (patron_id, book_id) VALUES (?, ?)";
    $stmt = $conn->prepare($borrowQuery);
    $stmt->bind_param("ss", $patronId, $bookId);

    // Execute the SQL query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

  <script>
    var home = document.getElementById("home");
if (home) {
home.addEventListener("click", function (e) {
window.location.href = "admin.html";
});
}
</script>

</body>
</html>