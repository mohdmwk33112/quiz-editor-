<?php
$conn = new mysqli("localhost", "", "", "  ");
try {
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    $quizId = $_POST['quizid'];
    $answers = $_POST['answer'];
    if($answers!=false){
    foreach ($answers as $questionId => $studentselectedAnswer) {
        if($studentselectedAnswer===false){
            $studentselectedAnswer='not answerd';
        }
        $sqlinsert = "INSERT INTO quiz_responses (quizid, questionid, selectedanswer)
                         VALUES ('$quizId', '$questionId', '$studentselectedAnswer')";
        if ($conn->query($sqlinsert) !== TRUE) {
            throw new Exception("Error submitting quiz response: " . $conn->error);
        }
    }
    echo "Quiz submitted successfully!";
}
else{
    echo"you didnt answer any question";
}
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
