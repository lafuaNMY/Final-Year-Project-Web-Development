<?php
    require ('fypfunctions.php');
    require ('fypconnection.php');
    if(isset($_POST['logout'])){
        $username = $_SESSION['username'];
        $rememberdevice = stripslashes($_REQUEST['remember']);
        $rememberdevice = mysqli_real_escape_string($con,$allow); 
            $query = "UPDATE alldata SET remember = '".$rememberdevice."' WHERE permission = ''AND owner = '".$username."';";
            if ($con->query($query) === TRUE) {
                header("Location: fyplogout.php");
            }else{
        }
    }
?>

<html>
    <head>
        <h2>FYP</h2>  
    </head>
    <body>
        <h3>USB device have been permited for use</h3><br>
        <table>
            <form method='post'>
                <tr><td><input type='checkbox' name='remember' value='yes'></td><td>Remember device</td><td><input type=submit name='history' placeholder='history'></td></tr>
                <tr><td></td><td></td><td><input type='submit' name='logout' placeholder='Log-out'></td></tr>
            </form>
        </table>
    </body>
</html>
