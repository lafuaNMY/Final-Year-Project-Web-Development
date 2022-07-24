<?php
    require("fypconnection.php");
    session_start();

    if (isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $row = mysqli_fetch_array($result);
        $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['username'] = $username;
                // Redirect user to index.php
	            header("Location: fypindex.php");
            }else{
        echo "<div class='form'>
    <h3>Username/password is incorrect.</h3>
    <br/>Click here to <a href='fyplogin.php'>Login</a></div>";
        }
    }
?>

<html>
    <head>
        <h2>FYP</h2>  
    </head>
    <body>
        <table>
            <form method="post">
                <tr><td>Username: </td><td><input type="text" name="username" required></tr>
                <tr><td>Password: </td><td><input type="password" name="password" required></tr>
                <tr><td></td><td><button name="login">Login</button></tr>
            </form>
        </table>
    </body>
</html>