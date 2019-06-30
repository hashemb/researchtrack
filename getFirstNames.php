<?php
$q=$_GET["q"];//get the q parameter from URL
//echo $q;
$con = mysqli_connect("localhost","root","","researchers");
$r = mysqli_query($con, "select fname, lname, username from user where fname like '$q%' || lname like '$q%'" ) ;
echo "<TABLE border=4>";
echo "<tr> <td> Fullname </td> <td> Username </td> </tr>";
 while($row = mysqli_fetch_array($r) ) {
      echo "<tr> <td>".$row['fname']." ". $row['lname'] ."</td> <td>". $row['username'] ."</td> </tr>";
	  //echo $q;
 }  	
echo"<TABLE>";
 mysqli_close($con);
 
?>