<!DOCTYPE html>
<html>
    <body>
        <?php
        $id = $_GET['id'];
        //echo $id;
        $con = mysqli_connect("localhost", "root", "", "researchers");
        $query = "SELECT paper.title, researcher.fname, researcher.lname, authorship.date FROM authorship,paper, researcher where authorship.paperId = paper.id and researcher.id = authorship.resId ORDER BY date DESC LIMIT $id";
        $result = mysqli_query($con, $query);

        echo "<table border='1' width 100%>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr >";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";

            echo "</tr>";
        }

        echo '</table>';
        ?> 
    </body>
</html>