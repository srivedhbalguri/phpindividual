<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conestoga Books</title>
    <link rel="stylesheet" href="css/project.css">
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <!-- the jQuery Cycle plugin -->
    <script src="js/jquery.cycle.all.js"></script>
    <script>
        $(document).ready(function () {
            $('#slideshow').cycle({
                fx: 'scrollHorz',
                speed: 1000,
                timeout: 2000,
                pause: 1
            });
        });
    </script>
</head>


<body>
    <div id="wrapper">
    <?php include("header.php")?>


        <main class="overflow">
            <div class="container">
                <br>
                <div id="slideshow">
                    <img src="images/books_slide1.jpg" width="100%" height="400">
                    <img src="images/books_slide2.jpg" width="100%" height="400">
                    <img src="images/books_slide3.jpg" width="100%" height="400">
                </div>
            </div>
            <h1>Importance of Books</h1>
            <div id="info">
                <p>
                    Millions of books have been published over the years and they continue to be an integral aspect of people’s lives around the globe. Acknowledging the importance of books is necessary for harnessing their benefits.
                    
                    From making it easier to understand different aspects of life to serve as worthwhile companions that take you through challenging times, books have proven to be precious commodities.
                    
                    Books are essential in a variety of ways that go beyond enriching your mind or entertaining you. They have stood the test of time as reliable references for centuries. They stimulate your senses and promote good mental health. Other benefits include enhancing your vocabulary, allowing you to travel through words, and inspiring positivity through motivational literature.</p>
            </div>
        </main>

        <?php include("footer.php")?>

    </div>
</body>

</html>