<?php

    $error = ""; $successMessage = "";

    if ($_POST) {

        if (!$_POST["name"]) {
              
          $error .= "A name is required.<br>";
          
        }
        
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        if (!$_POST["number"]) {
            
          $error .= "Phone Number is required.<br>";
          
        }
        
        if (!$_POST["feedback"]) {
            
            $error .= "The Feedback is required.<br>";
            
        }
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $interest =$_POST["interest"];
        
        
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "jeevamutharasi@gmail.com";
            
            $subject = $_POST['interest'];
            
            $content =  $_POST['feedback'];
            
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Thank You for the feedback!</div>';
                
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your feeddback couldn\'t be taken - please try again later</div>';
                
                
            } 
         }    
    }
    
    $servername = "sdb-f.hosting.stackcp.net";
    $username = "feedback-313834356a";
    $password = "hh3ky2ilaj";
    $dbname = "feedback-313834356a";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
      die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO feedback (`name`, `email`, `number`, `interest`, `feedback`) VALUES ('$name','$email',$number,'$interest','$content')";

    if (!mysqli_query($conn, $sql)) {
    }

    mysqli_close($conn);
    

?>