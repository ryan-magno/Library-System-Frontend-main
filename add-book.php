<?php
include 'db_connect.php';

// Prepare and bind
$book_id = $_POST['book_id'];
$title = $_POST['title'];
$author = $_POST['author'];
$author_first_name = explode(" ", $author)[0]; // Assuming the first word is the first name
$author_last_name = implode(" ", array_slice(explode(" ", $author), 1)); // Rest as last name
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$copies = $_POST['copies'];
$received_date = date('Y-m-d'); // Assuming received date is today

// File upload handling
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["book_cover"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["book_cover"]["tmp_name"]);
if($check !== false) {
  $uploadOk = 1;
} else {
  $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Check file size
if ($_FILES["book_cover"]["size"] > 500000) {
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {
    // Insert into books table
    $status = 'available'; // Assuming status is 'available' for new books
    $stmt = $conn->prepare("INSERT INTO books (book_id, status, book_title, author_first_name, author_last_name, publisher, genre, received_date, copies) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssi", $book_id, $status, $title, $author_first_name, $author_last_name, $publisher, $genre, $received_date, $copies);

    if ($stmt->execute() === TRUE) {
      // Insert into book_covers table
      $stmt = $conn->prepare("INSERT INTO book_covers (book_id, cover_image_path) VALUES (?, ?)");
      $stmt->bind_param("is", $book_id, $target_file);

      if ($stmt->execute() === TRUE) {
        // Success
        header("Location: success_page.html"); // Redirect to a success page
        exit();
      } else {
        echo "Error: " . $stmt->error;
      }
    } else {
      echo "Error: " . $stmt->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$conn->close();
?>
