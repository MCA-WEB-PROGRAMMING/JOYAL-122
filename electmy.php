<html>
    <head>
        <style>
            .center 
            {
                background-color: lime;
            margin: auto;
            width: 45%;
            border: 0px solid #73AD21;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
        </style>
    </head>
<body>
    <div class="center">
    <form method="POST">
    Enter the meter number:<input type="number" name="num"required><br><br>
    Enter the number of units: <input type="number" name="unit"required><br><br>
    Enter the category:
    <select name="tariff">
        <option value="rural">Rural</option>
        <option value="residential">Residential</option>
        <option value="commercial">Commercial</option><br><br>
<input type="submit" value="submit" name="submit"/></td>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['submit']))
{   $ex=0;
    $price=0;
    $unit=$_POST['unit'];
    $num=$_POST["num"];
    $tariff=$_POST['tariff'];
    if($tariff=="rural")
    {
        $ex=10.5;
        if(($unit>0)&&($unit<=50))
        {
            $price=$ex+($unit*4.10);
        }
        elseif(($unit>50)&&($unit<=100))
        {
            $price=$ex+($unit*5.55);
        }
    }
    elseif($tariff=="residential")
    {
        $ex=35.8;
        if(($unit>0)&&($unit<=50))
        {
            $price=$ex+($unit*4.10);
        }
        elseif(($unit>50)&&($unit<=100))
        {
            $price=$ex+($unit*5.55);
        }
    }
    elseif($tariff=="commercial")
    {
        $ex=50.35;
        if(($unit>0)&&($unit<=50))
        {
            $price=$ex+($unit*4.10);
        }
        elseif(($unit>50)&&($unit<=100))
        {
            $price=$ex+($unit*5.55);
        }
    }
echo "********Electricity Bill********";
echo "<br>";
echo "Your Meter Number is:".$num;
echo "<br>";
echo "Category:".$tariff;
echo "<br>";
echo "Units are:".$unit;
echo "<br>";
echo "Extra Charge:".$ex;
echo "<br>";
echo "Total  Charge:".$price;
echo "<br>";
}
?>

