<?php
session_start();
$courseid=$_GET['course'];
try {
    $conn = new mysqli("localhost", "", "", " ");

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $quizTitle = $_POST['quiz_title'];
    $quizduration = $_POST['Duration'];
    $sqlforquiz = "INSERT INTO `quizzes`(`courseid`, `title`, `duration`) VALUES ('$courseid','$quizTitle','$quizduration')";
    if ($conn->query($sqlforquiz) === TRUE) {
        $quizId = $conn->insert_id;
    } else {
        throw new Exception("Error adding quiz: " . $conn->error);
    }

    foreach ($_POST['questions'] as $i => $questionText) {
        $optionA = $_POST['options'][$i]['A'];
        $optionB = $_POST['options'][$i]['B'];
        $optionC = $_POST['options'][$i]['C'];
        $optionD = $_POST['options'][$i]['D'];
        $correctAnswer = $_POST['correct_answers'][$i];

        $sqlforquestion = "INSERT INTO questions (quizid, questiontext, option_a, option_b, option_c, option_d, correctanswer)
                VALUES ('$quizId', '$questionText', '$optionA', '$optionB', '$optionC', '$optionD', '$correctAnswer')";

        if ($conn->query($sqlforquestion) !== TRUE) {
            throw new Exception("Error adding question: " . $conn->error);
        }
    }

    echo "Quiz added successfully!";
    
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
