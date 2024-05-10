<?php
$courseid='1';
$idquiz='9';
?>
<!DOCTYPE html>
<head>
    <title>quiz</title>
</head>
<body>
    <h2>Quiz</h2>
    <div id='timer'></div>
    <?php
    try {
        $conn = new mysqli("localhost", "", "", "  ");
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        $quizId = $idquiz;
        $sqlquiz= "SELECT * FROM quizzes WHERE quizid = $quizId and courseid=$courseid";
        $quiz = $conn->query($sqlquiz);
        /*if ($quiz === false) {
            throw new Exception("Error executing query: " . $conn->error);
        }*/
        if ($quiz->num_rows > 0) {
            $rowquiz = $quiz->fetch_assoc();
            echo "<h3>{$rowquiz['title']}</h3>";
            $quizduration=$rowquiz['duration']*60000;
            echo "<script>
            const myTimeout = setTimeout(sub, '$quizduration')
            
            function sub() {
                window.alert('$quizduration');
                document.getElementById('submit').click();
            }
            </script>";
            $sqlquestions = "SELECT * FROM questions WHERE quizid = $quizId";
            $questions = $conn->query($sqlquestions);
            /*if ($questions === false) {
                throw new Exception("Error executing query: " . $conn->error);
            }*/
            if ($questions->num_rows > 0) {
                echo "<form id='quiz' action='/phplang/FINALPROJECT/php/studentsub.php' method='post'>";
                while ($rowquestion = $questions->fetch_assoc()) {
                    echo "<p>{$rowquestion['questiontext']}</p>";
                    echo "<label><input type='radio' name='answer[{$rowquestion['question_id']}]' value='A'> {$rowquestion['option_a']}</label><br>";
                    echo "<label><input type='radio' name='answer[{$rowquestion['question_id']}]' value='B'> {$rowquestion['option_b']}</label><br>";
                    echo "<label><input type='radio' name='answer[{$rowquestion['question_id']}]' value='C'> {$rowquestion['option_c']}</label><br>";
                    echo "<label><input type='radio' name='answer[{$rowquestion['question_id']}]' value='D'> {$rowquestion['option_d']}</label><br>";
                    echo "<hr>";
                }
                echo "<input type='hidden' name='quizid' value='$quizId'>";
                echo '<input id="submit" type="submit" value="Submit Quiz">';
                echo "</form>";
                
            } else {
                echo "ERROR LOADING THE QUESTIONS. PLEASE REPORT TO THE IT TEAM OR THE INSTRUCTOR";
            }
            
        } else {
            echo "QUIZ IS NOT AVAILABLE. PLEASE REPORT TO THE IT TEAM OR THE INSTRUCTOR";
        }
    } /*catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }*/
    catch (Exception $e) {
        echo "CAN'T CONNECT TO THE SERVER. PLEASE REPORT TO THE IT TEAM";
    } finally {
        $conn->close();
    }
    ?>
</body>
</html>
