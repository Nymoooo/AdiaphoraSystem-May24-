<?php
@include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('location: login_form.php');
    exit();
}



// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve quiz questions from the database
$query = "SELECT * FROM questions";
$result = $conn->query($query);

// Check if there are questions available
if ($result->num_rows > 0) {
    echo "<form action='submit_quiz.php' method='post'>"; // Assuming you have a separate page to handle quiz submission
    

    while ($row = $result->fetch_assoc()) {
        $questionId = $row['id'];
        $questionText = $row['question'];
        $option1 = $row['option1'];
        $option2 = $row['option2'];
        $option3 = $row['option3'];
        $option4 = $row['option4'];

        // Display the question and options
        echo "<h3>Question $questionId:</h3>";
        echo "<p>$questionText</p>";
        echo "<input type='radio' name='answer_$questionId' value='1'> $option1<br>";
        echo "<input type='radio' name='answer_$questionId' value='2'> $option2<br>";
        echo "<input type='radio' name='answer_$questionId' value='3'> $option3<br>";
        echo "<input type='radio' name='answer_$questionId' value='4'> $option4<br><br>";
    }

    // Add a submit button
    echo "<input type='submit' value='Submit Quiz' class='btn'>";
    echo "</form>";
} else {
    echo "No questions found.";
}

$conn->close();
?>
