<?php 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
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

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $date);

// Execute statement
if ($stmt->execute()) {
    echo "Date: $date, Category: $category stored successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Form</title>
</head>
<body>
    <h1>Date Form</h1>
    <form id="dateForm">
        <label for="dateInput">Enter Date:</label>
        <input type="date" id="dateInput" name="dateInput" required>
        <button type="submit">Submit</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
<script type="text/javascript">
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
    fetch('submit_date.php', {
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
          console.log('Success:', data);
          alert('Date stored as: ' + result);
      })
      .catch((error) => {
          console.error('Error:', error);
      });
});

</script>