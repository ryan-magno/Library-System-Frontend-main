<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./history.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
    />
  </head>
  <body>
    <div class="history2">

      <div class="header">
	  </div>

      <b class="search">Search for a Reference Number</b>
      <div class="search-bar">
        <input id="searchInput" class="type-here1" placeholder="Type here..." type="search" />

        <img class="icon" alt="" src="./public/magnifying-glass@2x.png" />
      </div>
      <div class="reference2">
        <b class="reference-number">Reference Number</b>
        <div class="frame3">
          <button id="referenceNumberStatus" class="vector-parent">
            <img class="frame-inner" alt="" src="./public/rectangle-13.svg" />

            <div class="status">Status</div>
          </button>
          <button id="viewButton" class="vector-group">
            <img
              class="rectangle-icon"
              alt=""
              src="./public/rectangle-13.svg"
            />

            <div class="view">View</div>
          </button>
        </div>
      </div>
      <div class="reference1">
        <b class="reference-number">Reference Number</b>
        <div class="frame3">
          <button class="vector-parent">
            <img class="frame-inner" alt="" src="./public/rectangle-13.svg" />

            <div class="status">Status</div>
          </button>
          <button class="vector-group">
            <img
              class="rectangle-icon"
              alt=""
              src="./public/rectangle-13.svg"
            />

            <div class="view">View</div>
          </button>
        </div>
      </div>
      <div class="navigation">
        <div class="frame5">
          <button class="history3">
            <div class="to-return">History</div>
          </button>
          <button class="overdue1">
            <div class="to-return">To Return</div>
          </button>
        </div>
        <div class="frame6">
          <button class="to-return1">
            <div class="to-return">Overdue</div>
          </button>
          <button class="lost1">
            <div class="to-return">Lost</div>
          </button>
        </div>
      </div>
      <div class="frame-wrapper">
        <div class="frame7">
          <div class="libraryrules1">
            <div class="red1"></div>
            <div class="white1"></div>
            <div class="white2"></div>
            <div class="libraryrules-child"></div>
            <div class="lrn-parent">
              <div class="lrn2">
                <img class="shape-icon6" alt="" src="./public/shape.svg" />

                <div class="lrn3">Patron ID</div>
                <div class="div">2938156915</div>
              </div>
              <div class="first-name2">
                <img class="shape-icon6" alt="" src="./public/shape.svg" />

                <div class="first-name3">First Name</div>
                <input id="firstNameInput" class="input4" placeholder="Type here..." type="text" />
              </div>
              <div class="last-name2">
                <img class="shape-icon6" alt="" src="./public/shape.svg" />

                <div class="first-name3">Last Name</div>
                <input id="lastNameInput" class="input5" placeholder="Type here..." type="text" />
              </div>
              <div class="borrowed-list">
                <div class="borrowed-list1">
                  <div class="borrow-list-parent">
                    <div class="borrow-list2">Borrow List</div>
                    <img class="frame-child3" alt="" src="./public/shape.svg" />

                    <div class="book-id5">Book ID</div>
                    <div class="book-title2">Book Title</div>
                  </div>
                  <div class="frame-div">
                    <img class="frame-child4" alt="" src="./public/shape.svg
                    " />

<div class="book-id6">Book ID</div>
<div class="book-title3">Book Title</div>
</div>
</div>
</div>
<div class="returndate2">
<div class="returndate3">
<div class="return-date1">Return Date</div>
<div class="borrow-date2">
<img
  class="borrow-date-item"
  alt=""
  src="./public/shape.svg"
/>

<button class="frame8">
  <img
    class="frame-child5"
    alt=""
    src="./public/add-sahpe.svg"
  />

  <div class="choose3">Choose</div>
</button>
</div>
</div>
</div>
<div class="borrowdate1">
<div class="borrow-date3">
<div class="return-date1">Borrow Date</div>
<div class="borrow-date2">
<img
  class="borrow-date-item"
  alt=""
  src="./public/shape.svg"
/>

<button class="frame8">
  <img
    class="frame-child5"
    alt=""
    src="./public/add-sahpe.svg"
  />

  <div class="choose3">Choose</div>
</button>
</div>
</div>
</div>
<div class="last-name4">
<img class="shape-icon9" alt="" src="./public/shape.svg" />

<input id="statusInput" class="input6" type="text" />
</div>
<select id="statusSelect" class="last-name5" required="{true}">
<option value="Available">Available</option>
<option value="To return">To return</option>
<option value="Overdue">Overdue</option>
<option value="Lost">Lost</option>
</select>
<div class="last-name6">Update Status</div>
</div>
</div>
</div>
</div>
<button class="home4" id="homeButton">
<div class="home-inner"></div>
<div class="home5">HOME</div>
<img class="vector-icon4" alt="" src="./public/vector.svg" />

<img class="vector-icon5" alt="" src="./public/vector.svg" />
</button>
<a href="index.html"><button class="log-out5">
<div class="log-out-inner"></div>
<div class="log-out6">LOG OUT</div>
</button></a>
</div>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#referenceNumberStatus').click(function() {
            const referenceNumber = $('#searchInput').val();
            fetchReferenceNumberStatus(referenceNumber);
        });

        $('#viewButton').click(function() {
            const referenceNumber = $('#searchInput').val();
            fetchBorrowedBookDetails(referenceNumber);
        });

        function fetchReferenceNumberStatus(referenceNumber) {
            $.ajax({
                url: 'this_page.php',
                type: 'GET',
                data: { action: 'referenceNumberStatus', borrow_id: referenceNumber },
                dataType: 'json',
                success: function(data) {
                    const status = data.status;
                    alert(`Reference Number Status: ${status}`);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching reference number status:', error);
                }
            });
        }
        function fetchBorrowedBookDetails(referenceNumber) {
            $.ajax({
                url: 'this_page.php',
                type: 'GET',
                data: { action: 'fetchBorrowedBookDetails', borrow_id: referenceNumber },
                dataType: 'json',
                success: function(data) {
                    const patronId = data.patron_id;
                    const firstName = data.first_name;
                    const lastName = data.last_name;
                    alert(`Borrowed Book Details:\nPatron ID: ${patronId}\nFirst Name: ${firstName}\nLast Name: ${lastName}`);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching borrowed book details:', error);
                }
            });
        }
    });
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['borrow_id'])) {
    include 'db_connect.php';

    $action = $_GET['action'];
    $borrow_id = $conn->real_escape_string($_GET['borrow_id']);

    if ($action === 'referenceNumberStatus') {
        $status_query = "SELECT book_status FROM borrow_records WHERE borrow_id = ?";
        $stmt = $conn->prepare($status_query);
        $stmt->bind_param("s", $borrow_id);
        $stmt->execute();
        $status_result = $stmt->get_result();

        if ($status_result->num_rows > 0) {
            $status_row = $status_result->fetch_assoc();
            echo json_encode(['status' => $status_row['book_status']]);
        } else {
            echo json_encode(['error' => 'No record found']);
        }
        $stmt->close();
    } elseif ($action === 'fetchBorrowedBookDetails') {
        $details_query = "SELECT patron_id, first_name, last_name FROM borrow_records WHERE borrow_id = ?";
        $stmt = $conn->prepare($details_query);
        $stmt->bind_param("s", $borrow_id);
        $stmt->execute();
        $details_result = $stmt->get_result();

        if ($details_result->num_rows > 0) {
            echo json_encode($details_result->fetch_assoc());
        } else {
            echo json_encode(['error' => 'No record found']);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Invalid action']);
    }

    $conn->close();
}
?>
