<html>
    <h1> Create an acoount </h1>
    <form action="signup.php" method="post">
        Username: <input type="text" name="username" placeholder="the username for logging in" >
        <br>
        Password: <input type="password" name="pass1" placeholder="make it tricky" >
        <br>
        Re-type Password: <input type="password" name="pass2" placeholder="make it tricky" >
        <br>
        First Name: <input type="text" name="fname" placeholder="your given name" >
        <br>
        Last Name: <input type="text" name="lname" placeholder="your surname" >
        <br>
        
        <input type="submit" name="signup" value="Sign up!" >
    </form>


</html>


<?php
if (isset($_POST["signup"])) {
//echo 'b';

    if ($_POST["lname"] && $_POST["fname"] && $_POST["username"] && $_POST["pass1"] && $_POST["pass2"]) {
//echo 'c';
        if ($_POST["pass1"] == $_POST["pass2"]) {
//echo 'd';
            $un = $_POST['username'];
            $pw = $_POST['pass1'];
            $fn = $_POST['fname'];
            $ln = $_POST['lname'];
            $conn = mysqli_connect("localhost", "root", "", "researchers");
            $sql = "insert into user (username,password,fname, lname, roleId) values('" .$un. "','". $pw ."','". $fn. "','$ln',2)";
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            echo "<h1>Account created succsefully</h1>";
            header("Location: login.php"); 
        } else
           
            echo "passwords doesnt match";
    } else
        echo "invaild input data";
}
?>