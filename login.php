<html>
    <title>Login </title>
    <body>
        <h1>Login to your account  </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <H3>Username </H3> <input type=text name="user" value="<?php if (isset($_COOKIE["user"])) echo $_COOKIE["user"]; ?>" >
            <H3>Password </H3><input type="password" name="pass" placeholder="**********" value="<?php if (isset($_COOKIE["pass"])) echo $_COOKIE["pass"]; ?>">
                        <br>

            Remember me <input type="checkbox" name="remember">
            <br>
            <input type="submit" name="submit"  value=" Login ">
        </form>
        <A Href="signup.php"> Sign up </A>
        <BR>
    </body>
</html>
<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['user']) || empty($_POST['pass']))
        echo "Username or Password is empty";
    else {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $con = mysqli_connect("localhost", "root", "", "researchers");
        $sql = "select * from user where password='$password' 
		         AND username='$username'";
        $result = mysqli_query($con, $sql); 
        $nbrows = mysqli_num_rows($result); 
        if ($nbrows == 1) {
            if (isset($_POST['remember']))
            setcookie("user", $username , time() + 3600, "/");
            setcookie("pass", $password , time() + 3600, "/");
            $res = mysqli_fetch_array($result);
            session_start();
           	$_SESSION['un'] = $username;
         	$_SESSION['pw'] = $password;		

            if ($res['roleId'] == 1) {//admin
                header("location:adminInterface.php?u=" . $username) ;
            } else if ($res['roleId'] == 2)
                header("location:userInterface.php?u=" . $username);
        } else
            echo "Username or Password is invalid";
        mysqli_close($con); // Closing Connection
    }
}
?>