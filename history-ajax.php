<?php
// history_ajax.php
include 'db_connect.php';

// Assuming you have established a connection to your database
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['borrow_id'])) {
    $action = $_GET['action'];
    $borrow_id = $_GET['borrow_id'];
    
    if ($action === 'referenceNumberStatus') {
        // Query to fetch reference number status based on borrow_id
        $status_query = "SELECT book_status FROM borrow_records WHERE borrow_id = $borrow_id";
        
        // Execute the query
        $status_result = $conn->query($status_query);
        
        if ($status_result) {
            // Fetch the status
            $status_row = $status_result->fetch_assoc();
            $status = $status_row['book_status'];
            
            // Return status as JSON
            echo json_encode(['status' => $status]);
        } else {
            // Error in query execution
            echo json_encode(['error' => 'Error executing status query']);
        }
    } elseif ($action === 'fetchBorrowedBookDetails') {
        // Query to fetch borrowed book details based on borrow_id
        $details_query = "SELECT patron_id, first_name, last_name FROM borrow_records WHERE borrow_id = $borrow_id";
        
        // Execute the query
        $details_result = $conn->query($details_query);
        
        if ($details_result) {
            // Fetch the details
            $details_row = $details_result->fetch_assoc();
            
            // Return details as JSON
            echo json_encode($details_row);
        } else {
            // Error in query execution
            echo json_encode(['error' => 'Error executing details query']);
        }
    } else {
        // Invalid action
        echo json_encode(['error' => 'Invalid action']);
    }
} else {
    // Missing parameters
    echo json_encode(['error' => 'Missing parameters']);
}

// Close connection
$conn->close();
?>