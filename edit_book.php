<?php
include 'db_connect.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'delete':
            $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
            if ($book_id) {
                // Check if the book exists in the database
                $check_sql = "SELECT * FROM books WHERE book_id = ?";
                $check_stmt = $conn->prepare($check_sql);
                $check_stmt->bind_param("i", $book_id);
                $check_stmt->execute();
                $check_result = $check_stmt->get_result();
                
                if ($check_result->num_rows == 0) {
                    $response['error'] = "Book not found in the database.";
                } else {
                    $sql = "DELETE FROM books WHERE book_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $book_id);
                    if ($stmt->execute()) {
                        $response['message'] = "Book deleted successfully.";
                    } else {
                        $response['error'] = "Error deleting book: " . $conn->error;
                    }
                    $stmt->close();
                }
                $check_stmt->close();
            } else {
                $response['error'] = "Book ID is required.";
            }
            break;

        case 'update':
            $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
            $book_title = isset($_POST['title']) ? $_POST['title'] : '';
            $author_first_name = isset($_POST['author_first_name']) ? $_POST['author_first_name'] : '';
            $author_last_name = isset($_POST['author_last_name']) ? $_POST['author_last_name'] : '';
            $publisher = isset($_POST['publisher']) ? $_POST['publisher'] : '';
            $copies = isset($_POST['copies']) ? $_POST['copies'] : '';
            $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
            $section = isset($_POST['section']) ? $_POST['section'] : '';
            $publication_date = isset($_POST['publication_date']) ? $_POST['publication_date'] : '';

            // Check if the book exists in the database
            if ($book_id || !empty($book_title)) {
                if ($book_id) {
                    $check_sql = "SELECT * FROM books WHERE book_id = ?";
                    $check_stmt = $conn->prepare($check_sql);
                    $check_stmt->bind_param("i", $book_id);
                } else {
                    $check_sql = "SELECT * FROM books WHERE book_title = ?";
                    $check_stmt = $conn->prepare($check_sql);
                    $check_stmt->bind_param("s", $book_title);
                }
                
                $check_stmt->execute();
                $check_result = $check_stmt->get_result();
                
                if ($check_result->num_rows == 0) {
                    $response['error'] = "Book not found in the database.";
                } else {
                    if (!$book_id) {
                        $book = $check_result->fetch_assoc();
                        $book_id = $book['book_id'];
                    }
                
                    // Proceed with the update operation
                    if (!empty($book_title) && !empty($author_first_name) && !empty($author_last_name) && !empty($publisher) && !empty($copies) && !empty($genre) && !empty($section) && !empty($publication_date)) {
                        $sql = "UPDATE books SET book_title = ?, author_first_name = ?, author_last_name = ?, publisher = ?, publication_date = ?, genre = ?, section = ?, copies = ? WHERE book_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssssssi", $book_title, $author_first_name, $author_last_name, $publisher, $publication_date, $genre, $section, $copies, $book_id);
                        if ($stmt->execute()) {
                            $response['message'] = "Book information updated successfully.";

                            // Check if a new cover image is uploaded
                            if (isset($_FILES['file'])) {
                                // Handle file upload securely
                                include 'file_upload.php';
                            }
                        } else {
                            $response['error'] = "Error updating book: " . $conn->error;
                        }
                        $stmt->close();
                    } else {
                        $response['error'] = "All fields are required.";
                    }
                }
                $check_stmt->close();
            } else {
                $response['error'] = "Book ID or title is required.";
            }
            break;

        case 'upload':
            if (isset($_FILES['file'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $response['error'] = "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                
                // Check file size
                if ($_FILES["file"]["size"] > 500000) {
                    $response['error'] = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                
                // Allow certain file formats
                if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                    $response['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $response['error'] = "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $response['message'] = "The file ". htmlspecialchars(basename($_FILES["file"]["name"])). " has been uploaded.";
                    } else {
                        $response['error'] = "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $response['error'] = "No file uploaded.";
            }
            break;

        case 'get_book_suggestions':
            $input = isset($_POST['input']) ? $_POST['input'] : '';
            $suggestions = array();

            if ($input) {
                // Query the database for matching titles
                $query = "SELECT book_id, book_title FROM books WHERE book_title LIKE ?";
                $stmt = $conn->prepare($query);
                $input_param = '%' . $input . '%';
                $stmt->bind_param("s", $input_param);
                $stmt->execute();
                $result = $stmt->                $result = $stmt->get_result();

                // Fetch results and add them to suggestions array
                while ($row = $result->fetch_assoc()) {
                    $suggestions[] = array(
                        'value' => $row['book_id'],
                        'label' => $row['book_title']
                    );
                }

                $stmt->close();
            } else {
                $response['error'] = "Input is required.";
            }
            $response['suggestions'] = $suggestions;
            break;

        case 'get_book_details':
            $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
            if ($book_id) {
                $sql = "SELECT * FROM books WHERE book_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $book_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $response = $result->fetch_assoc();
                } else {
                    $response['error'] = "Book not found.";
                }
                $stmt->close();
            } else {
                $response['error'] = "Book ID is required.";
            }
            break;

        default:
            $response['error'] = "Invalid action.";
    }
} else {
    $response['error'] = "Invalid request method.";
}

echo json_encode($response);
$conn->close();
?>
