<?php
session_start();
require("mysqli_connect.php");
if (isset($_GET['book']))
  {
    $book=$_GET['book'];  
    $q2="SELECT * FROM books where pid=$book";
    $r2=mysqli_query($connection,$q2);
    if (mysqli_num_rows($r2) > 0) {
        while($row = mysqli_fetch_assoc($r2)){
            $left= $row['Inventory'];
    if(!$left==0)   
    {             
        $_SESSION['bookId'] = $_GET['book'];
        header("Location: checkout.php");
        exit();
    }
    else{
        $message="Book out of stock. Select other Book";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
        }
    }    
  }

?>
<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conestoga Books</title>
    <link rel="stylesheet" href="css/project.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>



</head>


<body>
    <div id="wrapper">
        <?php include("header.php")?>


        <main class="overflow">
            <h1>Books</h1>
            <form action="store.php" method="POST">
            <?php
               
                $q1="SELECT * FROM books";
                $r1=mysqli_query($connection,$q1);
                if (mysqli_num_rows($r1) > 0) {
                    while($row = mysqli_fetch_assoc($r1)){
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"> <?php echo $row['Name'] ?> </h2>
                                    <img src="images/<?php echo $row['Image']; ?>" class="card-img-top" width="150px" height="225">
                                    <p class="card-text">
                                    <?php echo "Rs {$row['Price']}"; 
                                    if($row['Inventory']==0){
                                        ?><span style="font-weight: bold;color:red">(Out of stock)</span><?php
                                    }
                                    ?>     
                                    </p>        
                                    <?php echo '<a href="store.php?book='. $row["PId"].'" class="cart">Buy Now</a>';?> </p>

                                </div>
                            </div>
                    </div>
                    <?php                    
                    }
                }
                else {
                    echo "0 results";
                }
            ?>
            </form>
        </main>
        <?php include("footer.php")?>

    </div>
</body>

</html>