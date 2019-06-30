<html>

    <h1> Show close vaccancies of positions </h1>
    <form action="" method="POST">
        Showing <input type="number" name="numOfFeeds" step="1" value="3"> Feeds
        <br>
        <input type="checkbox" value="Only already vaccant positions" name="ch">
        check this if you want only the UPCOMING vaccant positions, uncheck if you want the ALREADY vaccant positions too
        <br>
        <input type="submit" value="Show" name="show">

    </form>

    
    <?php
    $con = mysqli_connect("localhost", "root", "", "researchers");
    if (!isset($_POST["numOfFeeds"])) {
        if( isset($_POST["ch"]) && $_POST["ch"] == "on") {
            $queryStart = "SELECT endDate, posName FROM position WHERE endDate > NOW() ORDER BY position.endDate LIMIT 3";
            $result = mysqli_query($con, $queryStart);



            echo "<table border='1' width 100%>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr >";
                echo "<td>" . $row['endDate'] . "</td>";
                echo "<td>" . $row['posName'] . "</td>";


                echo "</tr>";
            }
            echo '</table>';
        }
        else{
       
            $query = "SELECT endDate, posName FROM position ORDER BY ABS( DATEDIFF( endDate, NOW() ) ) LIMIT 3";

            $result = mysqli_query($con, $query);



            echo "<table border='1' width 100%>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr >";
                echo "<td>" . $row['endDate'] . "</td>";
                echo "<td>" . $row['posName'] . "</td>";


                echo "</tr>";
            }
            echo '</table>';
            
        }
    } else {
     
        
        
        
        if(isset($_POST["ch"]) && $_POST["ch"] == "on") {
            $queryStart = "SELECT endDate, posName FROM position WHERE endDate > NOW() ORDER BY position.endDate LIMIT ". $numOfFeeds;
            $result = mysqli_query($con, $queryStart);

            echo "<table border='1' width 100%>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr >";
                echo "<td>" . $row['endDate'] . "</td>";
                echo "<td>" . $row['posName'] . "</td>";


                echo "</tr>";
            }
            echo '</table>';
        }
        else{
       
            $query = "SELECT endDate, posName FROM position ORDER BY ABS( DATEDIFF( endDate, NOW() ) ) LIMIT ". $_POST["numOfFeeds"];

            $result = mysqli_query($con, $query);



            echo "<table border='1' width 100%>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr >";
                echo "<td>" . $row['endDate'] . "</td>";
                echo "<td>" . $row['posName'] . "</td>";


                echo "</tr>";
            }
            echo '</table>';
            
        
        }
        
        
    }
    ?>

    <br>
    <a href="logout.php"> Log Out </a>

</html>