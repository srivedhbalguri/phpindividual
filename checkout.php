<?php
session_start();

if (isset($_SESSION['selectedBook']))
  {
    $book= $_SESSION['selectedBook'] ;
    
  }
 ?> 
<!DOCTYPE>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conestoga Books</title>
    <link rel="stylesheet" href="css/project.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <div id="wrapper">
    <?php include("header.php")?>


        <main class="overflow">
            <h1>CheckOut</h1>
            <div class="row">
                <div class="col-75">
                    <div class="container" style="width:100%">
                        <form method="POST" action="">

                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Address</h3>
                                    <label for="fname"> First Name</label>
                                    <input type="text" id="fname" name="firstname" placeholder="srivedh" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>">
                                    <label for="city">Last Name</label>
                                    <input type="text" id="lname" name="lastname" placeholder="balguri" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>">
                                    <label for="email"> Email</label>
                                    <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                                    <label for="adr"> Address</label>
                                    <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>">
                                    <label for="phone">Mobile No</label>
                                    <input type="text" id="phone" name="phone" placeholder="9999999999" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">

                                </div>

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>


                                    <select name="payment">
                                        <option value="Credit Card" name="credit">Credit Card</option>
                                        <option value="Debit Card" name="debit">Debit Card</option>
                                    </select>
                                    <div class="col-25">
                                        <div class="container">
                                            <h4>Cart
                                                <span class="price" style="color:black">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <b>1</b>
                                                </span>
                                            </h4>
                                            <?php
                                                require("mysqli_connect.php");
                                                $q1="SELECT * FROM books where pid=$book";
                                                $r1=mysqli_query($connection,$q1);
                                                if (mysqli_num_rows($r1) > 0) {
                                                    while($row = mysqli_fetch_assoc($r1)){
                                                        echo'<img src="images/'. $row['Image']. '" class="card-img-top" width="100px" height="120">';
                                                        echo '<p>'. $row["Name"].' <span class="price">Rs '. $row["Price"].'</span> </p>';  
                                                        echo' <hr>
                                                        <p>Total <span class="price" style="color:black"><b>Rs '  . $row["Price"].'</b></span></p>';
                                                    }
                                                }
                                            ?>    
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <input type="submit" value="Continue to checkout" class="btn">
                        </form>
                    </div>
                </div>
                
            </div>

        </main>

        <?php include("footer.php")?>

    </div>
</body>

<?php
if( $_SERVER['REQUEST_METHOD']=='POST'){
    
    $errors = false;
    $payment = $_POST['payment'];
    if(empty($_REQUEST['firstname'])){
        $message = "Enter Firstname";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $errors = true;
    }
    else{
        $firstname = $_POST['firstname'];
        $firstname=mysqli_real_escape_string($connection,$firstname);
    }
    if(empty($_REQUEST['lastname'])){
        $message = "Enter Lastname";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $errors = true;
    }
    else{
        $lastname = $_POST['lastname'];
        $lastname=mysqli_real_escape_string($connection,$lastname);
    }
    if(empty($_REQUEST['address'])){
        $message = "Enter Address";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $errors = true;
    }
    else{
        $address = $_POST['address'];
        $address=mysqli_real_escape_string($connection,$address);
    }

    if(empty($_REQUEST['email'])){
        $message = "Enter Email";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $errors = true;
    }
    else{
        $email = $_POST['email'];
        $emailid=mysqli_real_escape_string($connection,$email);
    }
    if(empty($_REQUEST['phone'])){
        $message = "Enter Phonen No";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $errors = true;
    }
    else{
        $phone = $_POST['phone'];
        $phoneno=mysqli_real_escape_string($connection,$phone);
    }

    if($errors == false){
        $q2 = "INSERT INTO customer(LastName,FirstName,Payment,Address,PhoneNo,Email,PId) VALUES ('$lastname','$firstname','$payment','$address','$phoneno','$emailid','$book')";
        $r1 = mysqli_query($connection,$q2);
        
        if($r1){
            $message="Order successfull";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $q3="UPDATE books 
            SET Quantity = Quantity - 1
            WHERE PId = $book
            and Quantity > 0";
            $r2 = mysqli_query($connection,$q3);
            ?>
            <script type='text/javascript'>window.location.href = 'index.php';</script>;
            <?php
        }
        echo mysqli_error($connection);
    }
}
?>

</html>