<html>

  <head>
  </head>

  <body>

  <form method="POST">


<table cellpadding="2" width="20%" bgcolor="99FFFF" align="center"

  cellspacing="2">


<tr>

  <td colspan=2>

  <center><font size=4><b> Form Validation</b></font></center>

  </td>

  </tr>


<tr>

  <td>NAME</td>

  <td><input type="text" name=name id="name" size="30"></td>

  </tr>
  <tr>

  <td>MOBILENO</td>

  <td><input type="number" name="mobno" id="mobno" size="30"></td>

  </tr>
  <tr>
  <td>EMAIL</td>

  <td><input type="email" name="email" id="emailid" size="30"></td>

  </tr>

    <td>PASSWORD</td>
  
    <td><input type="password" name="password" id="password" size="30"></td>
  
    </tr>
    </tr>

    <td>CONFIRM PASSWORD</td>
  
    <td><input type="password" name="cpassword" id="password" size="30"></td>
  
    </tr>

  <tr>

  <td><input type="reset"></td>

  <td colspan="2"><input type="submit" value="Submit Form" name="submit"/></td>

  </tr>

  </table>

  </form>

  </body>

  </html>
<?php
if(isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobno=$_POST['mobno'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $con=mysqli_connect("localhost","root","","regi_php");
    if($name== "")
    {
        echo "<script>alert('Enter First Name ')</script>";
    }
    else if(!preg_match("@[a-zA-Z]@",$name))
    {
        echo "<script>alert('Enter Your  ')</script>";
    }
    else if($email == "")
    {
        echo "<script>alert('Enter Email ')</script>";
    }
    elseif(!preg_match("@[a-z0-9]@",$email))
    {
        echo "<script>alert('Email id in lowercase only ')</script>";
    }
    else if(!preg_match('@[6-9]\d{9}@', $mobno))
    {
        echo "<script>alert('Enter Valid Mobile Number')</script>";
    }
    else if( $pass == "")
    {
        echo "<script>alert('Enter Password ')</script>";
    }
    else if (strlen( $pass )< 8) 
    {
            echo "<script>alert('Your Password Must Contain At Least 8 Characters')</script>";
    }
    else if(!preg_match("#[0-9]+#",$pass)) 
    {
            echo "<script>alert('Your Password Must Contain At Least 1 Number')</script>";
    }
    else if(!preg_match("#[A-Z]+#",$pass))
    {
            echo "<script>alert('Your Password Must Contain At Least 1 Capital Letter')</script>";
    }
    else if(!preg_match("#[a-z]+#",$pass)) 
    {
            echo "<script>alert('Your Password Must Contain At Least 1 Lowercase Letter')</script>";
    } 
    elseif($cpass=="")
    {
        echo "<script>alert('Enter Confirm Password ')</script>";
    }
    elseif($cpass!=$pass)
    {
        echo "<script>alert('Passwords are different')</script>";
    }
    else{
   $query= "INSERT INTO `tbl_regi`(`name`, `email`, `mobno`, `password`) VALUES ('$name','$email','$mobno','$pass')";
   if(mysqli_query($con,$query))
   {
       echo "sucess inserted";
   }
  }
  $search="SELECT * FROM `tbl_regi`";
  if($search==NULL)
  {
    echo "NO data";
  }
  $data=mysqli_query($con,$search);
  echo "<html><table align='center' border='1'><tr bgcolor='cyan'><th>Username</th><th>password</th><th>MobileNo</th></tr>";
  while($res=mysqli_fetch_assoc($data))
  {
    echo "<tr bgcolor='#B2BEB5'><td>".$res['name']."</td><td>".$res['password']."</td><td>".$res["mobno"]."</td></tr>";
   
  }
  echo "</table></html>";
}
