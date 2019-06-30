<html>

    <form method="post" action="addPaper.php" >
        Add a new paper
        <input type="text" name="pname" >
        <br>
        <input type="submit" name="add" >

    </form>
    <?php
    if (isset($_POST['add'])) {
        
        $paperName = $_POST['pname'];
        $conn = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "INSERT INTO paper (id, title) VALUES ('','" . $paperName . "')";
        $result = mysqli_query($conn, $sql);
        }
    ?>
    <br>
    <a href="logout.php"> Log Out </a>

</html>