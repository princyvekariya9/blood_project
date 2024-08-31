<?php 
// Database connection settings
$servername = "localhost";
$username = "root";   // Update with your MySQL username
$password = "";       // Update with your MySQL password
$dbname = "blood";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST data is set
    if (isset($_POST['date']) && isset($_POST['category'])) {
        $date = $_POST['date'];
        $category = $_POST['category'];

        // Prepare and execute the appropriate SQL statement
        switch ($category) {
            case 'today':
                $sql = "INSERT INTO today_dates (date) VALUES (?)";
                break;
            case 'future':
                $sql = "INSERT INTO future_dates (date) VALUES (?)";
                break;
            case 'past':
                $sql = "INSERT INTO past_dates (date) VALUES (?)";
                break;
            default:
                die("Invalid category");
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind the date parameter
        $stmt->bind_param("s", $date);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Date: $date, Category: $category stored successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Error: Required data not received.</p>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 1rem;
            color: #333;
        }
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 0.5rem;
        }
        input[type="date"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 1rem;
        }
        button {
            padding: 0.75rem 1.5rem;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 1rem;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Date Form</h1>
        <form id="dateForm">
            <label for="dateInput">Enter Date:</label>
            <input type="date" id="dateInput" name="date" required>
            <button type="submit">Submit</button>
            <div id="responseMessage" class="message"></div>
        </form>
    </div>
    <script>
    document.getElementById('dateForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const dateInput = document.getElementById('dateInput').value;
        const enteredDate = new Date(dateInput);
        const today = new Date();
        
        // Reset time for comparison purposes
        today.setHours(0, 0, 0, 0);
        enteredDate.setHours(0, 0, 0, 0);
        
        let result;
        if (enteredDate > today) {
            result = 'future';
        } else if (enteredDate < today) {
            result = 'past';
        } else {
            result = 'today';
        }
        
        // Send data to the PHP server
        fetch('', { // Sending the request to the current page
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                date: dateInput,
                category: result
            })
        }).then(response => response.text())
          .then(data => {
              document.getElementById('responseMessage').innerText = 'Date stored as: ' + result;
          })
          .catch((error) => {
              console.error('Error:', error);
              document.getElementById('responseMessage').innerText = 'An error occurred.';
          });
    });
    </script>
</body>
</html>
