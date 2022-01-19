<?php
$players=array("Rohit Sharma","Ravindra Jadeja","Sanju Samson","Devdhath padikal","Mohammed Shami","Jasprit Bumrah");
echo "<center><table border='1' bgcolor='cyan' width='200'><tr bgcolor='orange'><th>SI No.</th><th>Player</th></tr>";
foreach($players as $key=>$value)
{
    echo"<tr><td>",$key+1,"</td><td>$value</td></tr>";
}
echo "<table><center>";