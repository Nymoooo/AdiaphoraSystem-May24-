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
        echo "<form action='submit_quiz.php' method='post' style='max-width: 500px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);'>";
        while ($row = $result->fetch_assoc()) {
            $questionId = $row['id'];
            $questionText = $row['question'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
            $option3 = $row['option3'];
            $option4 = $row['option4'];

            // Display the question and options
            echo "<h3 style='font-size: 18px; font-weight: bold; margin-bottom: 10px;'>Question $questionId:</h3>";
            echo "<p style='margin-bottom: 15px;'>$questionText</p>";
            echo "<input type='radio' name='answer_$questionId' value='1' style='margin-right: 5px;'> $option1<br>";
            echo "<input type='radio' name='answer_$questionId' value='2' style='margin-right: 5px;'> $option2<br>";
            echo "<input type='radio' name='answer_$questionId' value='3' style='margin-right: 5px;'> $option3<br>";
            echo "<input type='radio' name='answer_$questionId' value='4' style='margin-right: 5px;'> $option4<br><br>";
        }

        // Add a submit button
        echo "<input type='submit' value='Submit Quiz' style='background-color: #4CAF50; color: #fff; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer; border-radius: 5px;' class='btn'>";
        echo "</form>";
    } else {
        echo "<p>No Quizzes found.</p>";
    }

    $conn->close();
?>
