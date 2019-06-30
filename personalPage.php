<?php
$q=$_GET["q"];//get the q parameter from URL
//echo $q;
$con=mysqli_connect("localhost","root","","researchers");
$r = mysqli_query($con, "select lname from researcher where lname like '$q%' " ) ;
echo "<TABLE border=4>";
 while($row = mysqli_fetch_array($r) ) {
      echo "<td>".$row['lname']."</td>";
	  //echo $q;
 }  	
echo"<TABLE>";
 mysqli_close($con);
 
?>