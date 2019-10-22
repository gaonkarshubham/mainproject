<?php
if(isset($_POST['reset'])){
    require 'server.php';

    
    $email=$_POST['email'];
    $password1=$_POST['password'];
    $passwordRep1=$_POST['password-rep'];
    

    if(empty($password1) || empty($passwordRep1)){
        header("Location: ../reset2.php?error=emptyfields&Name=".$username."&mail=".$email);
        exit();
    }

    elseif($password1 !== $passwordRep1){
        header("Location: ../reset2.php?error=checkpassword&Name=".$username."&email=".$email);
        exit();
    }

    else{
        $sql="SELECT email FROM login WHERE email=?";
        $statement=mysqli_stmt_init($conn);
       
        if(!mysqli_stmt_prepare($statement,$sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }

        else{
            mysqli_stmt_bind_param($statement,"s",$email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $result=mysqli_stmt_num_rows($sql);

            if($result<0){
                header("Location: ../login.php?error=usernotfound=");
                exit();
            }

            else{
                $hashpass1=password_hash($password1,PASSWORD_DEFAULT);
                $sql="UPDATE login SET pass='$hashpass1' WHERE email='$email'";
                $statement=mysqli_stmt_init($conn);
             
                if(!mysqli_stmt_prepare($statement,$sql)){
                    header("Location: ../login.php?error=sqlerror");    
                    exit();
                }

                else{
                   
                    mysqli_stmt_bind_param($statement,"ss",$email,$hashpass1);
                    mysqli_stmt_execute($statement);   
                    header("Location: ../login.php?resetpassword=success");
                    exit();
                }
       
            }
        
        }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
    }

}
else {
    header("Location: ../reset.php");
    exit();
}

