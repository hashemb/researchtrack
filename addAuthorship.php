<html>

    <form method="post" action="addAuthorship.php" >
        Choose author


        <?php
        $conn = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "select id, fname, lname from researcher";
        $result = mysqli_query($conn, $sql);
        echo '<select name="researcherSelection">';
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $fn = $row['fname'];
            $ln = $row['lname'];

            echo "<option value='" . $id . "'>" . $fn . " " . $ln . "</option>";
        }
        echo"</select>";
        echo '<br>';
        ?>

        Choose paper


        <?php
        $conn = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "select paper.id, paper.title from paper WHERE paper.id NOT IN (select authorship.paperId from authorship);";
        $result = mysqli_query($conn, $sql);
        echo '<select name="paperSelection">';
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $title = $row['title'];


            echo "<option value='" . $id . "'>" . $title . "</option>";
        }
        echo"</select>";
        ?>

        <br>
        <input type="date"  name="publishDate" value="1970-01-01">
        <br>
        <input type="submit" value="Add Authorship" name="add">

    </form>

    <?php
    if (isset($_POST['add'])) {
        $resid = $_POST['researcherSelection'];
        $paperId = $_POST['paperSelection'];
        $pubDate = $_POST['publishDate'];
        $conn = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "INSERT INTO authorship (resId, paperId, date) VALUES ('" . $resid . "','" . $paperId . "','" . $pubDate . "')";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <br>
    <a href="logout.php"> Log Out </a>

</html>