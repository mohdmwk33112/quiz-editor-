<?php
$courseid=$_GET['course'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Editor</title>
    <link rel="stylesheet" href="/phplang/FINALPROJECT/CSS/instructor.css">
</head>
<body>
    <h2>Create Quiz</h2>
    <form action="/phplang/FINALPROJECT/PHP/instructor.php?course=<?php $courseid ?>" method="post">
        <label for="quiz_title">Quiz Title:</label>
        <input type="text" name="quiz_title" required><br>
        <label for="duration">Duration in Minutes</label>
        <input type="number" name="Duration">
        <div id="questions">
            <h3>Question 1</h3>
            <label for="question1">Question:</label>
            <input type="text" name="questions[1]" required><br>

            <label for="option_a1">Option A:</label>
            <input type="text" name="options[1][A]" required><br>

            <label for="option_b1">Option B:</label>
            <input type="text" name="options[1][B]" required><br>

            <label for="option_c1">Option C:</label>
            <input type="text" name="options[1][C]" required><br>

            <label for="option_d1">Option D:</label>
            <input type="text" name="options[1][D]" required><br>

            <label for="correct_answer1">Correct Answer:</label>
            <input type="text" name="correct_answers[1]" required><br>
        </div>

        <button type="button" onclick="addQuestion()">Add Question</button>

        <input type="submit" value="Save Quiz">
    </form>

    <script>
        function addQuestion() {
            var questionsDiv = document.getElementById('questions');
            var questionNumber = questionsDiv.getElementsByTagName('h3').length + 1;

            var newQuestion = document.createElement('div');
            newQuestion.innerHTML = "<h3>Question " + questionNumber + "</h3>" +
                "<label for='question" + questionNumber + "'>Question:</label>" +
                "<input type='text' name='questions[" + questionNumber + "]' required><br>" +
                "<label for='option_a" + questionNumber + "'>Option A:</label>" +
                "<input type='text' name='options[" + questionNumber + "][A]' required><br>" +
                "<label for='option_b" + questionNumber + "'>Option B:</label>" +
                "<input type='text' name='options[" + questionNumber + "][B]' required><br>" +
                "<label for='option_c" + questionNumber + "'>Option C:</label>" +
                "<input type='text' name='options[" + questionNumber + "][C]' required><br>" +
                "<label for='option_d" + questionNumber + "'>Option D:</label>" +
                "<input type='text' name='options[" + questionNumber + "][D]' required><br>" +
                "<label for='correct_answer" + questionNumber + "'>Correct Answer:</label>" +
                "<input type='text' name='correct_answers[" + questionNumber + "]' required><br>";

            questionsDiv.appendChild(newQuestion);
        }
    </script>
</body>
</html>
