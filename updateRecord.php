<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editId = $_POST['edit_id'];

    try {
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=foodbank', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update the database based on the submitted form data
        foreach ($_POST as $field => $value) {
            if (strpos($field, 'edit_field_') === 0) {
                $columnName = substr($field, strlen('edit_field_'));
                $updateQuery = "UPDATE donorDetails SET $columnName = :value WHERE id = :id";
                $updateStmt = $db->prepare($updateQuery);
                $updateStmt->bindParam(':value', $value, PDO::PARAM_STR);
                $updateStmt->bindParam(':id', $editId, PDO::PARAM_INT);
                $updateStmt->execute();
            }
        }

        // Redirect back to the admin panel after updating
        header("Location: adminPanel.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
