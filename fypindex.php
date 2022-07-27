<?php
    require ('fypfunctions.php');
    require ('fypconnection.php');
    if(isset($_POST['permission1'])){
        $username = $_SESSION['username'];
        $allow = stripslashes($_REQUEST['permission1']);
        $allow = mysqli_real_escape_string($con,$allow); 
            $query = "UPDATE alldata SET permission = '".$allow."' WHERE permission = ''AND owner = '".$username."';";
            if ($con->query($query) === TRUE) {
                header("Location: fypallow.php");
            }else{
        }
    }
    if(isset($_POST['permission2'])){
        $username = $_SESSION['username'];
        $denyaccess = stripslashes($_REQUEST['permission2']);
        $denyaccess = mysqli_real_escape_string($con,$allow); 
            $query = "UPDATE alldata SET permission = '".$denyaccess."' WHERE permission = ''AND owner = '".$username."';";
            if ($con->query($query) === TRUE) {
                header("Location: fypdeny.php");
            }else{
        }
    }
?>

<html>
    <head>
        <h2>FYP</h2>  
    </head>
    <body>
        <h3>There has been an unknown device connected to your computer<h3><br>
        <form method='post'>
            <table>
                <tr><td><button name="permission1" value='allow'style='background-color: green; color: white'>Allow Access</button></td><td><button name="permission2" value='deny'   style='background-color: red; color: white'>Deny Access</button></td></tr>
            </table>
    </form>