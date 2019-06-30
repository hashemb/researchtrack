<html>
    <head>
        <script>
            function showHint1(str)
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
                xmlhttp.open("GET", "getHintDB.php?q=" + str, true);
                xmlhttp.send();
            }
       
        </script>
        
    </head>
    <h1> Search for a researcher </h1>

    <p> Please note that multiple result can be drawn of a researchers with similar first/last names</p>
    <form action="search.php" method="POST">

        <input type="text" name="firstName" placeholder="Full Name" onkeyup="showHint1(this.value)">
       


        
        

    </form>
    <br>
      <div id="txtHint">  the result will be shown here </div>
   
    
    <a href="logout.php"> Log Out </a>

</html>