<?php
$insert=false;
if(isset($_POST['firstname'])){
    $server= "localhost";
    $dbname="id19811503_noodlewdb";
    $username="id19811503_noodlewoodledb";
    $password="VMpA[KmG15FEL)D]";
    
    $con= mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // echo "Success connecting to db";
    $firstname = $_POST['firstname'];
    $phone = $_POST['phone'];
    $email = $_POST['emailId'];
    $subject = $_POST['subject'];

    $sql="INSERT INTO `id19811503_noodlewdb`.`booking table form` (firstname,phone,emailId,subject,dt) VALUES ('$firstname','$phone','$email','$subject',current_timestamp())";
    if($con->query($sql)==true){
        $insert=true;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        * {
    box-sizing: border-box;
    font-family: "Monsterrat";
  }
  
  /* Style inputs */
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
 input[type=number], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  /* Style the container/contact section */
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
  }
  
  /* Create two columns that float next to eachother */
  .column {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  @media screen and (max-width: 600px) {
    .column, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }

.btn{
border-radius: 10px;
  }
  .submitMsg{
color: green;
}
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align:center">
          <h1>Booking Table Form</h1>
          <p>If you want quality food, come back here.</p>
          <?php
            if($insert==true){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you coming</p>";
            }
        ?>
        </div>
        <div class="row">
          <div class="column">
            <img src="/img/pexels-antony-trivet-12884053.jpg" style="width:100%">
          </div>
          <div class="column">
            <form action="contact.php" method="post">
              <label for="fname">Your Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Your name.." autocomplete="off">
              <label for="lname">Phone Number</label>
              <input type="number" id="lname" name="phone" placeholder="Your phone no.." autocomplete="off">
              <label for="country">Email Id</label>
              <input type="email" id="email" name="emailId" placeholder="Your email address.." autocomplete="off">
              <label for="subject">Description</label>
              <textarea id="subject" name="subject" placeholder="Write description about your preferance.." style="height:170px"></textarea>
              <input type="submit" value="Book" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
</body>
</html>