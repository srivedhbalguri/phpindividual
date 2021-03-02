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


</head>


<body>
    <div id="wrapper">
        <?php include("header.php")?>
        
        <main class="overflow">
            <h1>Orders</h1>
            <div class="container" style="width:100%">           
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>PhoneNo</th>
                        <th>Book</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            require("mysqli_connect.php");
                            $q1="SELECT c.LastName,c.FirstName,c.PhoneNo,b.Name,B.Price FROM customer c        
                            JOIN books b            
                            ON c.PId=b.PId   ";            
                            $r1=mysqli_query($connection,$q1);       
                            if (mysqli_num_rows($r1) > 0) {        
                                while($row = mysqli_fetch_assoc($r1)){            
                                    echo'        
                                    <tr>
                                        <td>'. $row["LastName"].'</td>
                                        <td>'. $row["FirstName"].'</td>
                                        <td>'. $row["PhoneNo"].'</td>
                                        <td>'. $row["Name"].'</td>
                                        <td>Rs '. $row["Price"].'</td>
                                    </tr>';                       
                                }
                            }
                            else{
                            echo "0 results";
                            }        
                        ?>                    
                    
                    </tbody>
                </table>
            </div>
            
            
        </main>
        <?php include("footer.php")?>

    </div>
</body>

</html>