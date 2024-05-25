<?php
include 'db_connect.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['input'];
    
    // Query the database for matching titles
    $query = "SELECT book_id, book_title FROM books WHERE book_title LIKE ?";
    $stmt = $conn->prepare($query);
    $input = '%' . $input . '%'; // Add wildcards to search for partial matches
    $stmt->bind_param("s", $input);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch results and add them to suggestions array
    $suggestions = array();
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = array(
            'value' => $row['book_id'],
            'label' => $row['book_title']
        );
    }

    $stmt->close();
    $response['suggestions'] = $suggestions;
} else {
    $response['error'] = "Invalid request method.";
}

echo json_encode($response);
$conn->close();
?>
