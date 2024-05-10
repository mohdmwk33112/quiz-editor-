# quiz-editor-and-viewer
a webpage that creates mcq quizzes using inputs from the instructor or teacher.

# instructorhtml.php:
This page serves as a quiz editor interface for instructors.

Form for Creating Quizzes:
A form is provided for instructors to create quizzes.
Instructors can enter the title of the quiz and specify the duration in minutes.
They can add multiple-choice questions to the quiz, including the question text, options A, B, C, and D, and the correct answer.
The form dynamically adds question fields as needed when the "Add Question" button is clicked, allowing instructors to add any number of questions to the quiz.

PHP Processing:
The PHP code retrieves the course ID from the URL query string.
This allows instructors to associate the quiz with a specific course.

Submission of Quiz Data:
When the instructor submits the form, the quiz data is sent to a PHP script (instructor.php) for processing.
The PHP script will handle storing the quiz data in a database or performing any other necessary actions, such as generating the quiz for students to take.

# instructor.php:
This PHP script handles the submission of quiz data from the quiz editor page.

Session Handling:
The script starts by initiating a session using session_start(). Sessions allow the script to maintain state across multiple requests.

Database Connection:
It attempts to establish a connection to the MySQL database named "online programming courses" hosted on the localhost using the credentials provided (username: "root", password: ""). This is done using the mysqli extension.

Inserting Quiz Information:
The script retrieves the course ID, quiz title, and quiz duration from the POST request.
It constructs an SQL query to insert this information into the quizzes table of the database.
If the insertion is successful, it retrieves the auto-generated quiz ID using $conn->insert_id.

Inserting Questions:
The script iterates over the questions submitted in the POST request.
For each question, it retrieves the question text, options A, B, C, and D, and the correct answer.
It constructs an SQL query to insert this information into the questions table of the database, associating each question with the quiz ID obtained earlier.
If any question insertion fails, an exception is thrown.

Error Handling:
If any errors occur during the execution of the script (e.g., connection failure, SQL errors), an exception is thrown, and an error message is displayed.
If the script executes successfully, it outputs a success message indicating that the quiz has been added.

Database Connection Closure:
Finally, regardless of whether an error occurred or not, the script closes the database connection to free up resources.

# student.php: 
This PHP script generates a quiz interface for students to attempt.

Initialization:
The script initializes two variables, $courseid and $idquiz, which represent the course ID and quiz ID, respectively. These are typically obtained from the URL parameters or another source, but here they are hardcoded for demonstration purposes.

HTML Structure:
The script generates the basic structure of an HTML document, including the <head> and <body> sections.
It displays the title of the quiz as an heading.

Timer Implementation:
The script calculates the duration of the quiz in milliseconds based on the quiz's duration retrieved from the database.
It embeds a JavaScript snippet that sets a timer to automatically submit the quiz after the specified duration. Upon timer expiration, an alert is displayed, and the quiz submission button is clicked programmatically.

Database Querying:
The script connects to a MySQL database named "online programming courses" hosted on localhost.
It retrieves quiz details (title and duration) and questions associated with the provided quiz ID and course ID from the database.
If the quiz and questions are available, they are displayed on the webpage in a form format, allowing students to select their answers

Error Handling:
The script includes error handling to deal with potential issues such as database connection failure or query execution errors.
If any errors occur during database operations, appropriate error messages are displayed to the user.

Rendering Questions:
For each quiz question retrieved from the database, the script dynamically generates HTML elements.
Radio buttons are used to allow students to select their answers for each question.

Form Submission:
Once students have selected their answers and submitted the form, the data is sent to a PHP script (studentsub.php) for processing.
Overall, this script provides students with a user-friendly interface to take quizzes, complete with automatic submission functionality based on the specified quiz duration. It retrieves quiz details and questions from a database, handles errors gracefully, and allows students to submit their answers for evaluation.

# studentsub.php:
This PHP script handles the submission of quiz responses from students

Database Connection:
The script establishes a connection to the MySQL database named "online programming courses" hosted on localhost using the mysqli extension.

Error Handling:
If the database connection fails, an exception is thrown with an appropriate error message.

Data Retrieval:
The script retrieves the quiz ID ($quizId) and the student's selected answers ($answers) from the POST request sent by the quiz-taking page.

Quiz Response Submission:
It iterates over the submitted answers, where each answer corresponds to a question ID ($questionId) and the selected answer by the student ($studentselectedAnswer).
For each answer, an SQL query is constructed to insert the quiz response into the quiz_responses table of the database.
If the insertion is successful, the script proceeds to the next answer. If an error occurs during insertion, an exception is thrown with an appropriate error message.

Success or No Answers Handling:
If the submission is successful, the script echoes a success message indicating that the quiz has been submitted successfully.
If the student did not answer any questions (i.e., the $answers array is empty), the script notifies the student that they didn't answer any questions.

Database Connection Closure:
Finally, the script closes the database connection in the finally block to release resources.
