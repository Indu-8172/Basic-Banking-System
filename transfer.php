<?php


$insert = false;
if(isset($_POST['receipent'])){
   $server = "localhost";
   $username = "root";
   $password = "";

   $con = mysqli_connect($server, $username, $password);

   if(!$con){
       die("connection to this database failed due to" . mysqli_connect_error());
   }
  
   
   $receipent = $_POST['receipent'];
   $sender = $_POST['sender'];
   $account = $_POST['account'];
   $expiry = $_POST['expiry'];
   $amount = $_POST['amount'];
   
   $sql = "INSERT INTO `banking`.`banking` (`sender`, `receipent`, `account`, `expiry`, `amount`, `dt`) VALUES ('$sender', '$receipent', '$account', '$expiry', '$amount', current_timestamp());";

   
   if($con->query($sql) == true){
    //    echo "successfully inserted";
    $insert = true;
   } 
   else{
       echo "ERROR: $sql <br> $con->error";
   }

   $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="banking.css" rel="stylesheet">
<style>
    
.btn{
    color:white;
    background:rgb(14, 107, 92);
    padding:8px 12px;
    font-size:20px;
    border:2px solid white;
    border-radius:14px;
    cursor:pointer;
}

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}

.container{
    max-width: 80%;
    padding:34px ;
    margin:auto;
}

.container h1{
    text-align: center;
    margin-bottom:50px;
}

input, textarea{
    width:80%;
    margin:11px;
    padding:7px;
    font-size:16px;
    border:2px solid black;
    border-radius:6px;
    outline:none;
}

form{
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
}
.submitMsg{
    color:green;
    font-size:2rem;
}
</style>
</head>

<body>

                <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand margin text-color brand" href="#">
        <img src="https://cdn5.vectorstock.com/i/1000x1000/26/24/bank-icon-blue-vector-20842624.jpg" width="50" height="50"  alt="logo">
        Spark's Bank
                  </a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav header">
                        <a class="nav-item nav-link margin text-color" href="file:///C:/Users/Indu%20Sharma/Documents/basic%20banking%20system/basic_banking.html#carouselExampleControls">Home</a>
                          <a class="nav-item nav-link margin  text-color" href="View_all_customers.html">View All Customers</a>
                          <a class="nav-item nav-link margin text-color" href="transfer_money.html">Transfer Money</a>
                          <a class="nav-item nav-link margin text-color" href="#">Transaction History</a>
                      <a class="nav-item nav-link margin text-color" href="#">About Us</a>
                    </div>
                  </div>
                </nav>
            </div>

<div class="container">
    <h1>Transfer your Money Safely</h1>
    <?php
    if($insert == true){
        echo "<p class='submitMsg'>Transaction Successfull</p>";
    }

    ?>
<form action="transfer.php" method = "post">
            <input type="text" name="receipent" id="receipent" placeholder="Receipent's Name">
            <input type="text" name="sender" id="sender" placeholder="Sender's Name">
            <input type="text" name="account" id="account" placeholder="Account Number">
            <input type="date" name="expiry" id="date">
            <input type="text" name="amount" id="Amount" placeholder="Amount">
            <button class="btn">Submit</button>
        </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="index.js"></script>

</body>
</html>
