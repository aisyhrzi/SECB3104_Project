<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('sss.jpg'); /* Change to your actual background image */
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .admin-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Edit Record</h1>

        <?php
        if (isset($_GET['id'])) {
            $editId = $_GET['id'];

            try {
                // Database connection
                $db = new PDO('mysql:host=localhost;dbname=donorInfo', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Fetch the record from the database based on the ID
                $query = "SELECT * FROM donorDetails WHERE id = :id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':id', $editId, PDO::PARAM_INT);
                $stmt->execute();
                $record = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($record) {
                    echo "<form method='post' action='updateRecord.php'>";
                    foreach ($record as $columnName => $value) {
                        echo "<label for='$columnName'>$columnName:</label>";
                        echo "<input type='text' name='edit_field_$columnName' value='" . htmlspecialchars($value) . "'>";
                    }
                    echo "<input type='hidden' name='edit_id' value='$editId'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                } else {
                    echo "Record not found.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Invalid record ID.";
        }
        ?>
    </div>
</body>
</html>

