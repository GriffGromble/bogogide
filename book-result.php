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


 <!-- Final Step: Show Book Recommendation -->
    <div id="quiz-result" class="quiz-step" style="display: none;">
        <h2>Recommended Book for You:</h2>
        <div id="bookRecommendation">
            <?php
            // Fetch a random book
            $books = $db->sql("SELECT * FROM bøger ORDER BY RAND() LIMIT 3");
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

            <script>
            function showResult() {
            document.getElementById("quiz-question7").style.display = "none";
            document.getElementById("quiz-result").style.display = "block";
}

            function restartQuiz() {
            document.getElementById("quiz-result").style.display = "none";
            document.getElementById("quiz-start").style.display = "block";
}
            </script>