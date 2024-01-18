<?php
require_once 'tmp/connection.php';
if (isset($_GET['id'])) {
    
    $userId = $_GET['id'];

    
    $up_Query = "UPDATE users SET Verified = 1 WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $up_Query);

  
    mysqli_stmt_bind_param($stmt, "i", $userId);


    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        
        header("Location: dashboard.php");
    } else {
        echo "Error updating user verification status: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Invalid user ID.";
}

?>
