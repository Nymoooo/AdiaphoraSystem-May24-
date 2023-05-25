<?php
@include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('location: login_form.php');
    exit();
}

// Retrieve user_id from the form submission
$user_id = $_POST['user_id'];

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
    $score = 0; // Initialize score

    while ($row = $result->fetch_assoc()) {
        $questionId = $row['id'];
        $correctAnswer = $row['correct_answer'];

        // Retrieve the selected answer from the submitted form
        $selectedAnswer = $_POST['answer_' . $questionId];

        // Check if the selected answer matches the correct answer
        if ($selectedAnswer == $correctAnswer) {
            $score++; // Increment score if the answer is correct
        }
    }

    // Store the score in the database
    $insertQuery = "INSERT INTO user_scores (user_id, score) VALUES ('$user_id', '$score')";

    if ($conn->query($insertQuery) === TRUE) {
        // Redirect to the score page with the score as a parameter
        header("Location: score.php?score=$score");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
} else {
    echo "No questions found.";
}

$conn->close();
?>
