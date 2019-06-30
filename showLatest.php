<html> 

    <head>
        <script>
            
        function showRecords(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "getpapers.php?id=" + str, true);
            xhttp.send();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
        }
        </script>

    </head>
    <h1> Show Latest Papers Out There! </h1>
    <p> More feeds, older publications  </p>

        <input type="number" name="numOfFeeds" step="1" value="3" onchange="showRecords(this.value)" min="3">
        





        <div id="txtHint">
    <?php
    $con = mysqli_connect("localhost", "root", "", "researchers");
    $query = "SELECT paper.title, researcher.fname, researcher.lname, authorship.date FROM authorship,paper, researcher where authorship.paperId = paper.id and researcher.id = authorship.resId ORDER BY date DESC LIMIT 3";
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
        </div>
    <br>
    <a href="logout.php"> Log Out </a>
</html>