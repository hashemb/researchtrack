<html>
    <form method="post" action="promoteUser.php">  
        <input type="text" placeholder="Username" name="un">
        <br>
        <input type="submit" name="sb" value="Promote">
        
        <br>
        



    </form>
    <?php
        $con = mysqli_connect("localhost", "root", "", "researchers");
    if (isset($_POST["sb"])) {
        // echo "hh";
        if (empty($_POST["un"])) {
            echo 'Enter the username';
        
        } else {
                
            
        $check = "select * from user where username='".$_POST["un"]."'";
        $result = mysqli_query($con, $check); 
        $nbrows = mysqli_num_rows($result); 
        if ($nbrows == 1)
        {
            
            $query = "UPDATE user SET user.roleId = '1' WHERE username = '".$_POST["un"]. "'";
            $result = mysqli_query($con, $query);
                
                echo 'Promoted!';
                
                header("location:adminInterface.php");
            }
            else {
                echo 'No such username';
                
            }
        }
    }
    ?>
<br>
    <a href="logout.php"> Log Out </a>
    
</html>