<?php
   session_start();
    
    include('header.php');
   
?>
    
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/icon.png" type="image/ico" rel="shortcut icon">
    

    <title>Sign Up</title>


    <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

  <script type="text/javascript">
  function validation()
  {
    var usrid=document.frm1.username;
    var passwd=document.frm1.pw1;
    var passwd2=document.frm1.pw2;

    //var name=document.frm1.name1;
    //var address=document.frm1.addr;
    //var zip=document.frm1.zc;
    //var email=document.frm1.em;

    if(uidvalid(usrid,5,12))
        return true;
        

  }

  function uidvalid(uid, x, y)
  {
    if(uid.value=="")
    {
      alert("Username cannot be empty!");
      username.focus();
      return false;
    }
    else if( uid.value.length>15)
    {
      alert("Username cannot be more than 15 characters!");
      username.focus();
      return false;
    }
    return true;
  }

  function passvalid(pass, x, y)
  {
    if(pass.value.length<8){
      alert("Password should have more than 7 characters!");
      pw1.focus();
      return false;

    }
    else if(!(passwd.value == passwd2.value))
    {
      alert("Passwords do not Match!");
      pw1.focus();
      return false;
    }
    return true;
  }

  function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pw1');
    var pass2 = document.getElementById('pw2');
    //Store the Confimation Message Object ...
    //var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pw1.value == pw2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        //pass2.style.backgroundColor = goodColor;
        //message.style.color = goodColor;
        //message.innerHTML = "Passwords Match!"
        //alert("Passwords do no Match");
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        //pass2.style.backgroundColor = badColor;
        //message.style.color = badColor;
        //message.innerHTML = "Passwords Do Not Match!"
        alert("Passwords do not Match");
        return false;
    }
    return true;
}  


</script>
</head>  

<body id="page-top" class="index">

   
        <section class="login">     
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        
                            <div class="modal-header" style="padding:10px 50px;">
                              <h4><span class="glyphicon glyphicon-lock"></span> SIGN UP</h4>
                            </div>

                            <div class="modal-body" style="padding:12px 50px;">

                              <form role="form" method="post" action="signup.php" name="frm1">
                                  <div class="form-group">
                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                    <p class="help-block text-danger"></p>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="psw" class="control-label"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                    <div class="controls">
                                      <input type="password" class="form-control" id="pw1" name="pw1" minlength="8" placeholder="Enter password" required>
                                      <p class="help-block text-danger"></p>
                                    </div>  
                                  </div>
                                  <div class="form-group control-group">
                                    <label for="psw" class="control-label"><span class="glyphicon glyphicon-eye-open"></span> Re-Enter Password</label>
                                    <div class="controls">
                                      <input type="password" class="form-control" data-validation-match-match="pw1" id="pw2" name="pw2" minlength="8" placeholder="Password" required>
                                      <p class="help-block text-danger"></p>
                                    </div>  
                                  </div>
                                  <div  class="form-group control-group">
                                    <div class="row">
                                      <div class="col-md-8 col-md-offset-2">
                                        <label class="radio-inline"><input type="radio" name="des" value="student" required>Student</label>
                                        <label class="radio-inline"><input type="radio" name="des" value="coach" required>Coach</label>
                                        <label class="radio-inline"><input type="radio" name="des" value="admin" required>Admin</label>
                                      </div>  
                                    </div>    
                                  </div> 
                                  <div class="form-group"> 
                                    <button type="submit" class="btn btn-primary btn-block"  name="submit" > Sign-Up</button><!--onclick="checkPass();"-->
                                  </div>  
                              </form>
                            </div>
                            <div class="modal-footer"><p><a href="login.php">Sign-In</a></p></div>
                    </div>  
                </div>    
            </div>
           
        </section>
        <?php
      include('config.php');

      if(isset($_POST['submit'])){
        if(isset($_POST['username'])) {

                    $username= $_POST['username'];
                    $password=$_POST['pw1'];
                    $des=$_POST['des'];
                    $query="insert into members (username,password,des) values('$username','$password','$des')";
                    if(!mysql_query($query)){

                      print '<script type="text/javascript">';
                      print 'alert("The ID ' .$_POST['username']. ' is already registered")';
                      print '</script>'; 
                    }
                    else{
                      //mysql_query($query) or die("<h1>UserName or Password Invalid</h1>");
                    session_start();
                    $_SESSION['login_user']=$username;
                    //$_SESSION['des']=$des;
                    //header("Refresh: 2; url=index.php");
                    //header('Location:index.php');

                    } 
                    
                    
        }
        else{
              print '<script type="text/javascript">';
              print 'alert("Enter Username")';
              print '</script>';   
            
        }
      }

      //Here
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "pifa";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      $result = "SELECT des FROM members" or die("Error: " . mysqli_error($con));

                $res = $conn->query($result);

                while($row = mysqli_fetch_array($res)) {
                    $des = $row['des'];

                    $_SESSION['des'] = $des;
                    //echo "<script>alert('WTF!);</script>";
                }
          if(isset($_SESSION['login_user'])){
          echo "<script>";
          echo "(window.location='index.php')";  
          echo "</script>";
        }


    ?>
             
     
    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!--Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

  </body>
</html>