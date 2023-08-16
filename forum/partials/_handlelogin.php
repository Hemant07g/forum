<?php
$showerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '_dbconnect.php';    
    $email=$_POST['loginEmail'];
    $pass=$_POST['loginPass'];
    $sql="SELECT * FROM `users` WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1)
    {
        $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_pass']))
            {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                $_SESSION['sno']=$row['sno'];
                echo "logged in ".$email;
                $showalert=true;
                header("Location: /forum/index.php?signinsuccess=true");
                exit();
            }
        else
        {
            $showerror="Failed to login";
            header("Location: /forum/index.php?signinsuccess=false&error=$showerror");
        }
    }
}
?>