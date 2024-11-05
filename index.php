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
<div class="container text-center mt-5">
    <!-- Step 1: Start Quiz -->
    <div id="quiz-start" class="quiz-step">
        <button id="startQuiz" class="btn btn-primary btn-lg">Tag Quiz</button>
    </div>

    <!-- Step 2: Question - Who is the book for? -->
    <div id="quiz-question1" class="quiz-step" style="display: none;">
        <h2>Hvem er bogen til?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectRecipient('self')">Mig selv</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectRecipient('someone_else')">For en anden</button>
    </div>

    <!-- Step 3: Question - Genre Preference -->
    <div id="quiz-question2" class="quiz-step" style="display: none;">
        <h2>Hvad leder du efter i en bog?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion1('fiction')">Romantik og stærke følelser</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion1('non-fiction')">Mystik og spænding</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion1('fantasy')">Fantasi og eventyr</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion1('history')">Historie og viden</button>
    </div>

    <!-- Additional question -->
    <div id="quiz-question3" class="quiz-step" style="display: none;">
        <h2>Hvilket miljø foretrækker du i en bog?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion2('små')">A) Små, hyggelige byer</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion2('mørke')">B) Mørke kroge</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion2('magi')">C) En ny verden med magi</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion2('historie')">D) Historiske byer</button>
    </div>

    <!-- Additional question -->
    <div id="quiz-question4" class="quiz-step" style="display: none;">
        <h2>Hvordan har du det med overnaturlige elementer i bøger?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion3('små')">A) Kun hvis der er kærlighed involveret</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion3('mørke')">B) Elsker det! Jo mere mystisk, desto bedre</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion3('magi')">C) Fantastisk! Drager og magi er velkomne</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion3('historie')">D) Helst realistisk – men en smule mystik kan gå an</button>
    </div>

    <!-- Additional question -->
    <div id="quiz-question5" class="quiz-step" style="display: none;">
        <h2>Hvilken karakter trækker dig mest?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion4('små')">A) En forelsket helt eller heltinde</button>
            <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion4('mørke')">B) En detektiv eller nogen med hemmelige evner</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion4('magi')">C) En troldmand eller eventyrer</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion4('historie')">D) En historisk figur eller en person fra virkeligheden</button>
    </div>

    <!-- Additional question -->
    <div id="quiz-question6" class="quiz-step" style="display: none;">
        <h2>Hvordan skal bogen få dig til at føle?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion5('små')">A) Berørt og måske lidt sentimental</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion5('mørke')">B) Spændt og lidt paranoid</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion5('magi')">C) Fortryllet og fascineret af nye verdener</button>
        <button class="btn btn-secondary w-50 my-2" onclick="selectQuestion5('historie')">D) Klogere og mere oplyst</button>
    </div>


    <div id="quiz-question7" class="quiz-step" style="display: none;">
        <h2>Hvilket citat tiltrækker dig mest?</h2>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult('kærlighed')">A) “Den største lykke i livet er kærlighed.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult('intet')">B) “Intet er, som det ser ud.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult('verden')">C) “Verden er fuld af magiske ting.”</button>
        <button class="btn btn-secondary w-50 my-2" onclick="showResult('gentager')"D) “Historien gentager sig.”</button>
    </div>

    <!-- Final Step: Show Book Recommendation -->
    <div id="quiz-result" class="quiz-step" style="display: none;">
        <h2>Recommended Book for You:</h2>
        <div id="bookRecommendation">
            <?php
            // Fetch a random book
            $books = $db->sql("SELECT * FROM bøger ORDER BY RAND() LIMIT 1");
            foreach ($books as $book) {
                ?>
                <div class="card w-100">
                    <div class="card-header">
                        <?php echo htmlspecialchars($book->bogNavn); ?>
                    </div>
                    <div class="card-body">
                        <p>Author: <?php echo htmlspecialchars($book->bogForfatter); ?></p>
                        <p><?php echo htmlspecialchars($book->bogBeskrivelse); ?></p>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($book->bogBillede); ?>" alt="Book Image" style="max-width:100%; height:auto;">
                    </div>
                    <div class="card-footer text-muted">
                        Price: <?php echo number_format($book->bogPris, 2, ',', '.'); ?> DKK
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <button class="btn btn-primary mt-3" onclick="restartQuiz()">Tag quiz igen</button>
    </div>
</div>

<script>
    // JavaScript to handle quiz steps
    document.getElementById("startQuiz").addEventListener("click", function () {
        document.getElementById("quiz-start").style.display = "none";
        document.getElementById("quiz-question1").style.display = "block";
    });

    function selectRecipient(recipient) {
        document.getElementById("quiz-question1").style.display = "none";
        document.getElementById("quiz-question2").style.display = "block";
    }

    function selectQuestion1(genre) {
        document.getElementById("quiz-question2").style.display = "none";
        document.getElementById("quiz-question3").style.display = "block";
    }

    function selectQuestion2(genre) {
        document.getElementById("quiz-question3").style.display = "none";
        document.getElementById("quiz-question4").style.display = "block";
    }

 function selectQuestion3(genre) {
        document.getElementById("quiz-question4").style.display = "none";
        document.getElementById("quiz-question5").style.display = "block";
    }

 function selectQuestion4(genre) {
        document.getElementById("quiz-question5").style.display = "none";
        document.getElementById("quiz-question6").style.display = "block";
    }

 function selectQuestion5(genre) {
        document.getElementById("quiz-question6").style.display = "none";
        document.getElementById("quiz-question7").style.display = "block";
    }

    function showResult() {
        document.getElementById("quiz-question7").style.display = "none";
        document.getElementById("quiz-result").style.display = "block";
    }

    function restartQuiz() {
        document.getElementById("quiz-result").style.display = "none";
        document.getElementById("quiz-start").style.display = "block";
    }
</script>
</body>
</html>
