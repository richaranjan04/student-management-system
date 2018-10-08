<!--Consider the activity - 4 HTML form. Write a PHP program to perform the validation on the fields in the form using PHP regular expression. -->


<html>
    <head>
        <title> ACTIVITY 5</title>
        <link href="lab5.css" rel="stylesheet" type="text/css">
        
    </head>
    
    <body>
      <?php
        
        $nameErr=$passErr=$repassErr=$emailErr="";
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(empty($_POST["name"]))
            {
                $nameErr = "Username id required !";
            }
            
            else 
            {
                $name=test_input($_POST["name"]);
                
                if(!preg_match("/^[a-zA-Z ]*$/",$name))
                {
                    $nameErr = "The username must contain only characters !";
                }
                    
                if(strlen($name)<8)
                    {
                        
                        $nameErr = "The username must be of minimum 8 characters !";
                    }
            }
            
            
            if(empty($_POST["emailid"]))
            {
                $emailErr = "Email must not be empty !";
            }
            else
            {
                $emailid=test_input($_POST["emailid"]);
                
                if (!filter_var($emailid, FILTER_VALIDATE_EMAIL))
                {
                    $emailErr = "The format of  email is invalid."; 
                }       
            }
            
            if(empty($_POST["pass"]))
            {
                $passErr = "Password must not be empty !";
            }
            else 
            {
                $pass=test_input($_POST["pass"]);
                
                if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{16,}/",$pass))
                {
                    $passErr = "Invalid syntax of the password.";
                }
                    
                
            }
            if(empty($_POST["repass"]))
            {
                $repassErr = "Please Re-enter your password.";
            }
            else
            {
                $repass=test_input($_POST["repass"]);
                
                if($pass!=$repass)
                {
                    $repassErr="Re-entered password doesnot match the Password !";
                }
            }
      
        }
      
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
        ?>
       
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
       <div  class="container">
        
           
  
            <label> Login: </label><input type="text" name="name" class="align" id="login">
            
            <label>Password: </label><input type="password" id="pass" name="pass" class="align"><p id="strong"></p><br>
            
            <label>ConfirmPassword:</label><input type="password" id="repass" name="repass" class="align"><br>
            
            <label>Gender: </label>
            <select name="gender" required>
                 <option value="male"> Male</option>
                 <option value="female">Female</option>
            </select><br>
            
            <label>Email : </label><input type="text" id="emailid" name="emailid" class="align"><br><br>
            <input type="submit" value="Submit" name="submit" id="register">
        
             <p id="e1"><?php echo $nameErr;?></p>
             <p id="e2"><?php echo $passErr;?></p>
             <p id="e3"><?php echo $repassErr;?></p>
             <p id="e4"><?php echo $emailErr;?></p>
        </div>
        </form>
        
    </body>
</html>