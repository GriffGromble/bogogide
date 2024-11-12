<?php
require "settings/init.php"; // Ensure this path is correct
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Book Quiz - Recommendations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>

    </style>
</head>
<body>
<div class="container mt-5 mb-5">
    <h1 class="justify-content-center mb-3">Din top 3 bog anbefaling</h1>
    <p>Hvem elsker ikke mordmysterier, psykologisk drama og nervepirrende plot twists? Her får du de bedst sælgende
        krimier lige nu, som vil få selveste Sherlock Holmes til at holde vejret. Lås døren, skru op for spændingen - og
        god læselyst!</p>

    <!-- First Carousel -->
    <div id="bookCarousel1" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            // Fetch first set of books from the database
            $books1 = $db->sql("SELECT * FROM bøger ORDER BY RAND() LIMIT 3");

            // Group books in sets of three for each slide
            $chunks1 = array_chunk($books1, 3);
            $activeClass = 'active';
            foreach ($chunks1 as $bookGroup) {
                ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                    <div class="row">
                        <?php foreach ($bookGroup as $book) { ?>
                            <div class="col-md-4">
                                <a href="review.php?id=<?php echo urlencode($book->bogID); ?>" class="text-decoration-none" style="color: inherit;">
                                    <div class="card h-100">
                                        <div class="card-header text-center">
                                            <?php echo htmlspecialchars($book->bogNavn); ?>
                                        </div>
                                        <div class="card-body text-center">
                                            <p><strong>Author:</strong> <?php echo htmlspecialchars($book->bogForfatter); ?></p>
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($book->bogBillede); ?>"
                                                 alt="Book Image" style="max-width:100%; height:auto;">
                                        </div>
                                        <div class="card-header">
                                            <p><?php echo htmlspecialchars($book->bogBeskrivelse); ?></p>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <strong>Price:</strong> <?php echo number_format($book->bogPris, 2, ',', '.'); ?> DKK
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                $activeClass = ''; // Only the first item should have 'active' class
            }
            ?>
        </div>
        <!-- First Carousel navigation buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel1" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- New Section: Hør som lydbog with Smaller Cards -->
    <div class="container mt-5 mb-3">
        <h2 class="text-center">Hør som lydbog</h2>
        <div class="row justify-content-center">
            <?php
            // Fetch two books for the "Hør som lydbog" section
            $audioBooks = $db->sql("SELECT * FROM bøger ORDER BY RAND() LIMIT 2");

            foreach ($audioBooks as $book) { ?>
                <div class="col-md-3">
                    <a href="review.php?id=<?php echo urlencode($book->bogID); ?>" class="text-decoration-none" style="color: inherit;">
                        <div class="card h-100 small-card">
                            <div class="card-header text-center">
                                <?php echo htmlspecialchars($book->bogNavn); ?>
                            </div>
                            <div class="card-body text-center">
                                <p><strong>Author:</strong> <?php echo htmlspecialchars($book->bogForfatter); ?></p>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($book->bogBillede); ?>"
                                     alt="Book Image" class="img-fluid">
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Divider or spacing between carousels -->
    <div class="mt-5 mb-3"><hr></div>

    <!-- Second Carousel -->
    <div id="bookCarousel2" class="carousel slide mt-4" data-bs-ride="carousel">
        <h1 class="align-content-center mb-5 mt-4">Andet vi tror du ville kunne lide</h1>
        <div class="carousel-inner">
            <?php
            // Fetch second set of books from the database
            $books2 = $db->sql("SELECT * FROM bøger ORDER BY RAND() LIMIT 10");

            // Group books in sets of three for each slide
            $chunks2 = array_chunk($books2, 3);
            $activeClass = 'active';
            foreach ($chunks2 as $bookGroup) {
                ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                    <div class="row">
                        <?php foreach ($bookGroup as $book) { ?>
                            <div class="col-md-4">
                                <a href="review.php?id=<?php echo urlencode($book->bogID); ?>" class="text-decoration-none" style="color: inherit;">
                                    <div class="card h-100">
                                        <div class="card-header text-center">
                                            <?php echo htmlspecialchars($book->bogNavn); ?>
                                        </div>
                                        <div class="card-body text-center">
                                            <p><strong>Author:</strong> <?php echo htmlspecialchars($book->bogForfatter); ?></p>
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($book->bogBillede); ?>"
                                                 alt="Book Image" style="max-width:100%; height:auto;">
                                        </div>
                                        <div class="card-header">
                                            <p><?php echo htmlspecialchars($book->bogBeskrivelse); ?></p>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <strong>Price:</strong> <?php echo number_format($book->bogPris, 2, ',', '.'); ?> DKK
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                $activeClass = ''; // Only the first item should have 'active' class
            }
            ?>
        </div>
        <!-- Second Carousel navigation buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-primary">Tag quizzen igen</a>
    </div>
</div>



<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
