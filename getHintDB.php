<?php
$q=$_GET["q"];//get the q parameter from URL
//echo $q;
$con=mysqli_connect("localhost","root","","researchers");
$r = mysqli_query($con, "select fname,id, lname from researcher where fname like '$q%' || lname like '$q%' " ) ;
echo "<TABLE border=4>";
//echo '<tr> > </tr>';
 while($row = mysqli_fetch_array($r) ) {
      echo "<tr>  <td> <a href='personalPage.php?q=". $row['id']."'> " .$row['fname']. " ".$row['lname'] ."  </a> </td> </tr>";
	  
 }  	
echo"<TABLE>";
 mysqli_close($con);
 
?>