<html>
    <head>
        <script>
            function showfirsts(str)
            {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getFirstNames.php?q=" + str, true);
                xmlhttp.send();
            }

        </script>

    </head>
    <form action="deleteUser.php" method="post">

        Name of the user to be deleted <input type="text" placeholder="username" name="un" onkeyup="showfirsts(this.value)" >
        <input type="submit" name="del">

    </form>
    <?php
    if (isset($_POST["del"])) {
        $un = $_POST['un'];
        $con = mysqli_connect("localhost", "root", "", "researchers");
        $query = "DELETE FROM user WHERE username='" . $un . "'";
        $result = mysqli_query($con, $query);
        echo "deleted succsefully";
    }
    ?>
    <br>
    <div id="txtHint">
        
        
    </div>
    
    
    
    <a href="logout.php"> Log Out </a>


</html>