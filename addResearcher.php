<html> 

    <form method="post" action="addResearcher.php" >


        <input type="text" placeholder="researcher's first name" name="fname" >
        <input type="text" placeholder="researcher's last name" name="lname" >
        <input type="date" placeholder=" Year of birth" name="yob" value="1970-01-01">
        <input type="submit" value="Add researcher" name="add">
    </form>
    <?php
    if (isset($_POST["add"])) {
        if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['yob'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $yob = $_POST['yob'];
        $conn = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "insert into researcher (id,fname,lname,YOB) values('','" . $fname . "','" . $lname . "','" . $yob . "' )";

        $result = mysqli_query($conn, $sql);}
        
        else{
    echo 'Missing Data';
            
        }
    }
    ?>
    <br>
    <a href="logout.php"> Log Out </a>

</html>