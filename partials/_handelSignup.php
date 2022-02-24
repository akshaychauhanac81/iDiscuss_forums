<!-- <P>The requested URL was not found on this server.</P> -->


 <?php

$showError="false";
// $showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include '_dbconnect.php';
    $user_name = $_POST['signUpName'];
    $user_email = $_POST['signUpEmail'];
    $user_mobile = $_POST['signUpMobile'];
    $user_pass = $_POST['signUpPassword'];
    $user_conf_pass = $_POST['conf_signUpPassword'];

    //check  whether this email exist

    $existSql = "select * from `users` where user_email = '$user_email' And user_mobile='$user_mobile'";
    $result = mysqli_query($conn,$existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError ="Email already exist !";
    }
    else{
        if($user_pass == $user_conf_pass){
            $hash = password_hash($user_pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_mobile`, `user_pass`, `user_time`) VALUES ('$user_name', '$user_email', '$user_mobile', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /forums/index.php?signUpsuccess=true");
                exit();
            }
        }
        else{
            $showError ="Password do not match";
        }
    }
    header("Location: /forums/index.php?signUpsuccess=false&error=$showError");
}

?> 