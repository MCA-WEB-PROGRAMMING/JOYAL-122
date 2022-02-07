<html>
    <head>
        <title>
            Employee Details
        </title>
    </head>
    <body>
        <h2><center><u><b>EMPLOYEE DETAILS</b></u></center></h2>
        <form action=""method="POST">
        <table align="center">
            <tr>
                <td>Employee id</td>
                <td><input type="text" name="empid"></td>
            </tr>
            <tr>
                <td>Employee Name</td>
                <td><input type="text" name="empname"></td>
            </tr>
            <tr>
                <td>Job Name</td>
                <td><input type="text" name="jobname"></td>
            </tr>
            <tr>
                <td>Manager id</td>
                <td><input type="text" name="manid"></td>
            </tr>
            <tr>
                <td>Salary</td>
                <td><input type="text" name="sal" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SUBMIT" name="submit"></td>
            </tr>
        </table>
    </body>
</html>
<?php
if(isset($_POST['submit']))
{
   $empid=$_POST['empid'];
   $empname=$_POST['empname'];
   $jobname=$_POST['jobname'];
   $manid=$_POST['manid'];
   $sal=$_POST['sal'];
   $conn=mysqli_connect('localhost','root','','emp_db');
   if(!$conn)
   {
       die("Connection failed".mysqli_error());
   }
   $query="INSERT INTO `tbl_emp`(`empid`, `empname`, `jobname`, `manid`, `sal`) VALUES ('$empid','$empname','$jobname','$manid','$sal')";
   if(mysqli_query($conn,$query))
    {
        echo "Succefully Inserted";
    }
   $query1="SELECT * FROM `tbl_emp` WHERE `sal`> '35000'";
   $data=mysqli_query($conn,$query1);
   echo "<html><table align='center' border='1'><tr bgcolor='cyan'><th>Empname</th><th>Salary</th></tr>";
   while($res=mysqli_fetch_assoc($data))
   {
    echo "<tr bgcolor='#B2BEB5'><td>".$res['empname']."</td><td>".$res['sal']."</td></tr>";
   }
   echo "</table></html>";
}
?>
