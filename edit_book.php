<?php
include 'db_connect.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    switch ($action) {
        case 'delete':
            $book_id = $_POST['book_id'];
            if (!empty($book_id)) {
                $sql = "DELETE FROM books WHERE book_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $book_id);
                if ($stmt->execute()) {
                    $response['message'] = "Book deleted successfully.";
                } else {
                    $response['error'] = "Error deleting book: " . $conn->error;
                }
                $stmt->close();
            } else {
                $response['error'] = "Book ID is required.";
            }
            break;

            case 'update':
                $book_id = $_POST['book_id'];
                $book_title = $_POST['title'];
                $author_first_name = $_POST['author_first_name'];
                $author_last_name = $_POST['author_last_name'];
                $publisher = $_POST['publisher'];
                $copies = $_POST['copies'];
                $genre = $_POST['genre'];
                $section = $_POST['section'];
                $publication_date = $_POST['publication_date'];
            
                if (!empty($book_id) && !empty($book_title) && !empty($author_first_name) && !empty($author_last_name) && !empty($publisher) && !empty($copies) && !empty($genre) && !empty($section) && !empty($publication_date)) {
                    $sql = "UPDATE books SET book_title = ?, author_first_name = ?, author_last_name = ?, publisher = ?, publication_date = ?, genre = ?, section = ?, copies = ? WHERE book_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssssi", $book_title, $author_first_name, $author_last_name, $publisher, $publication_date, $genre, $section, $copies, $book_id);
                    if ($stmt->execute()) {
                        $response['message'] = "Book information updated successfully.";
            
                        // Check if a new cover image is uploaded
                        if (isset($_FILES['file'])) {
                            $cover_file = $_FILES['file'];
                            // Check file type
                            $allowed_types = array('image/jpeg', 'image/png');
                            $file_extension = pathinfo($cover_file['name'], PATHINFO_EXTENSION);
                            if (in_array($cover_file['type'], $allowed_types) && in_array($file_extension, array('jpg', 'png'))) {
                                // Process and upload cover image
                                $upload_dir = 'cover_images/'; // Directory where cover images are stored
                                $cover_file_path = $upload_dir . basename($cover_file['name']);
            
                                if (move_uploaded_file($cover_file['tmp_name'], $cover_file_path)) {
                                    // File uploaded successfully, now update book_covers table
                                    $sql_cover = "INSERT INTO book_covers (book_id, cover_image_path) VALUES (?, ?) ON DUPLICATE KEY UPDATE cover_image_path = ?";
                                    $stmt_cover = $conn->prepare($sql_cover);
                                    $stmt_cover->bind_param("iss", $book_id, $cover_file_path, $cover_file_path);
                                    if ($stmt_cover->execute()) {
                                        // Cover image path updated successfully
                                        $response['message'] .= " Cover image path updated successfully.";
                                    } else {
                                        // Error updating cover image path
                                        $response['error'] = "Error updating cover image path: " . $conn->error;
                                    }
                                    $stmt_cover->close();
                                } else {
                                    // Error uploading cover image
                                    $response['error'] = "Error uploading cover image.";
                                }
                            } else {
                                $response['error'] = "Only JPG and PNG files are allowed.";
                            }
                        }
                    } else {
                        $response['error'] = "Error updating book: " . $conn->error;
                    }
                    $stmt->close();
                } else {
                    $response['error'] = "All fields are required.";
                }
                break;
            
            case 'upload':
                if (isset($_FILES['file'])) {
                    $file = $_FILES['file'];
                    $upload_dir = 'uploads/';
            
                    // Ensure the upload directory exists
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
            
                    // Check file type
                    $allowed_types = array('image/jpeg', 'image/png');
                    if (in_array($file['type'], $allowed_types)) {
                        // Generate a unique filename to prevent conflicts
                        $file_name = uniqid() . '_' . basename($file['name']);
                        $upload_file = $upload_dir . $file_name;
            
                        if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                            $response['message'] = "File uploaded successfully.";
                            // You can also include the filename in the response
                            $response['file_name'] = $file_name;
                        } else {
                            $response['error'] = "Error uploading file.";
                        }
                    } else {
                        $response['error'] = "Only JPG and PNG files are allowed.";
                    }
                } else {
                    $response['error'] = "No file uploaded.";
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
