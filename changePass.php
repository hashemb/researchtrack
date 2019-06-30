<html>
    <form method="post" action="changePass.php">  
        <input type="password" placeholder="Old password" name="op">
        <br>

        <input type="password" placeholder="new password" name="np">
        <br>
        <input type="password" placeholder="confirm new password" name="np1" >
        <br>
        <input type="submit" value="change" name="change">

        <p> You will have to re-sign in after you change the password </p>


    </form>
    <?php
    session_start();
    $un = $_SESSION['un'];
    $pw = $_SESSION['pw'];
    if (isset($_POST["change"])) {
        // echo "hh";
        if (empty($_POST["op"]) || empty($_POST["np"]) || empty($_POST["np1"])) {
            echo 'You must fill all fields';
        } else {
            $op = $_POST['op'];
            $np = $_POST['np'];
            $np1 = $_POST['np1'];


            if ($pw != $op) {
                echo 'old password is wrong';
            } else if ($np != $np1) {

                echo 'New Password does not match';
            } else {

                $con = mysqli_connect("localhost", "root", "", "researchers");
                $query = "UPDATE user SET user.password = '".$np."' WHERE username = '".$un. "'";
                $result = mysqli_query($con, $query);
                $_session = [];
                header("location:login.php");
            }
        }
    }
    ?>
<br>
    <a href="logout.php"> Log Out </a>
    
</html>