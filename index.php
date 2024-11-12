<?php
require "settings/init.php"; // Ensure this path is correct
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Book Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container text-center mt-5 test">
    <!-- Step 1: Start Quiz -->
    <div id="quiz-start" class="quiz-step">
        <button id="startQuiz" class="btn btn-danger btn-lg">Tag Quiz</button>
    </div>

    <!-- Step 2: Question - Who is the book for? -->
    <div id="quiz-question1" class="quiz-step" style="display: none;">
        <h2>Hvem er bogen til?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(2)">Mig selv</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(2)">For en anden</button>
        <br>
        <button class="btn btn-primary" onclick="nextQuestion(2)">Next</button>
    </div>

    <!-- Step 3: Question - Genre Preference -->
    <div id="quiz-question2" class="quiz-step" style="display: none;">
        <h2>Hvad leder du efter i en bog?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(3)">Romantik og stærke følelser</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(3)">Mystik og spænding</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(3)">Fantasi og eventyr</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(3)">Historie og viden</button>
        <br>
        <button class="btn btn-secondary" onclick="prevQuestion(1)">Back</button>
        <button class="btn btn-primary" onclick="nextQuestion(3)">Next</button>
    </div>

    <!-- Step 4: Preferred Setting -->
    <div id="quiz-question3" class="quiz-step" style="display: none;">
        <h2>Hvilket miljø foretrækker du i en bog?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(4)">A) Små, hyggelige byer</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(4)">B) Mørke kroge</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(4)">C) En ny verden med magi</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(4)">D) Historiske byer</button>
        <br>
        <button class="btn btn-secondary" onclick="prevQuestion(2)">Back</button>
        <button class="btn btn-primary" onclick="nextQuestion(4)">Next</button>
    </div>

    <!-- Step 5: Supernatural Elements -->
    <div id="quiz-question4" class="quiz-step" style="display: none;">
        <h2>Hvordan har du det med overnaturlige elementer i bøger?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(5)">A) Kun hvis der er kærlighed involveret</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(5)">B) Elsker det! Jo mere mystisk, desto bedre</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(5)">C) Fantastisk! Drager og magi er velkomne</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(5)">D) Helst realistisk – men en smule mystik kan gå an</button>
        <br>
        <button class="btn btn-secondary" onclick="prevQuestion(3)">Back</button>
        <button class="btn btn-primary" onclick="nextQuestion(5)">Next</button>
    </div>

    <!-- Step 6: Character Preference -->
    <div id="quiz-question5" class="quiz-step" style="display: none;">
        <h2>Hvilken karakter trækker dig mest?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(6)">A) En forelsket helt eller heltinde</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(6)">B) En detektiv eller nogen med hemmelige evner</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(6)">C) En troldmand eller eventyrer</button>
        <button class="btn btn-secondary w-50 my-2" onclick="nextQuestion(6)">D) En historisk figur eller en person fra virkeligheden</button>
        <br>
        <button class="btn btn-secondary" onclick="prevQuestion(4)">Back</button>
        <button class="btn btn-primary" onclick="nextQuestion(6)">Next</button>
    </div>

    <!-- Step 7: Favorite Quote -->
    <div id="quiz-question6" class="quiz-step" style="display: none;">
        <h2>Hvilket citat tiltrækker dig mest?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult()">A) “Den største lykke i livet er kærlighed.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult()">B) “Intet er, som det ser ud.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult()">C) “Verden er fuld af magiske ting.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult()">D) “Historien gentager sig.”</button>
        <br>
        <button class="btn btn-secondary" onclick="prevQuestion(5)">Back</button>
    </div>

</div>

<script>
    // Function to show the next question
    function nextQuestion(index) {
        hideAllQuestions();
        document.getElementById("quiz-question" + index).style.display = "block";
    }

    // Function to show the previous question
    function prevQuestion(index) {
        hideAllQuestions();
        document.getElementById("quiz-question" + index).style.display = "block";
    }

    // Hide all question divs
    function hideAllQuestions() {
        const steps = document.querySelectorAll(".quiz-step");
        steps.forEach(step => {
            step.style.display = "none";
        });
    }

    document.getElementById("startQuiz").addEventListener("click", function () {
        hideAllQuestions();
        document.getElementById("quiz-question1").style.display = "block";
    });

    // Function to show the result
    function showResult() {
        window.location.href = "result.php";
    }
</script>
</body>
</html>
