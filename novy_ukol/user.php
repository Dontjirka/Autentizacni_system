<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>

<head>
    <title>User</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
<div class="container">
    <div class="title">User</div>
        <form class="val" method="POST" action="login.php">
        <div class="user-details">
          <div class="input-box2">
          <div class="button2">
          <input type="submit" value="Logout" name="buttonLogout"/>
       </form>   
</div>  
</div>

<?php
    #Get email
    require("index.php");
    $email = @$_SESSION["var"];

    if (!$_SESSION){
        header("Location: login.php");
        exit;
    }

    if(isset($_POST['email'])){
        $email =$_POST['email'];    
    }

    $hello ="SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn,$hello);

           if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){ 
                echo "Email: " . $row["email"]."<br>";
                echo "Jmeno: " . $row["jmeno"]."<br>";
                echo "Prijmeni: " . $row["prijmeni"]."<br>";
                echo "Typ: " . $row["typ"]."<br>";
            }
        }
    #Logout
    if (array_key_exists('buttonLogout',$_POST)) {
        header("Location: login.php");
        exit;
    }
?>
   
</body>
</html>