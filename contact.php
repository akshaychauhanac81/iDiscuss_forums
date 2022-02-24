<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Welcome to iDiscuss - codes | forums </title>
    <style>
    .container {
        min-height: 10vh;
        /* min-width: 120px; */
    }

    #form_control {
        display: inherit;
        width: 504px;
        border: 2px solid green;
        border-radius: 19px;
    }

    #container_id {
        display: flex;
    }

    #card_id {
        display: block;
        height: 30rem;
        width: 18rem;
        margin-left: 14rem;
        border: 2px solid green;
        font-family: fantasy;
        padding: 6px;
        background: #4fb14f;
    }
    </style>
</head>

<body>
    <?php  include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>

    <?php
    $showAlert=false;
    $c_checkbox = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
    //   echo "true";
        // insert database in data connection
        $c_first_name = $_POST['cont_first_name'];
        $c_last_name = $_POST['cont_last_name'];
        $c_email = $_POST['cont_email'];
        $c_pass = $_POST['cont_pass'];
        $c_address1 = $_POST['cont_address1'];
        $c_address2 = $_POST['cont_address2'];
        $c_city = $_POST['cont_city'];
        $c_state = $_POST['cont_state'];
        $c_pin = $_POST['cont_pin'];
        $c_check_out = $_POST['cont_checkbox'];

        
        
        // $c_first_name = str_replace("<", "&lt;", $c_first_name);
        // $c_first_name = str_replace(">", "&gt;", $c_first_name);
        // $c_last_name = str_replace("<", "&lt;", $c_last_name);
        // $c_last_name = str_replace(">", "&gt;", $c_last_name);
        // $c_email = str_replace(">", "&gt;", $c_email);
        // $c_email = str_replace(">", "&gt;", $c_email);
        // $c_pass = str_replace(">", "&gt;", $c_pass);
        // $c_pass = str_replace(">", "&gt;", $c_pass);
        
        // $c_address1 = str_replace("<", "&lt;", $c_address1);
        // $c_address1 = str_replace(">", "&gt;", $c_address1);
        // $c_address2 = str_replace(">", "&gt;", $c_address2);
        // $c_address2 = str_replace(">", "&gt;", $c_address2);
        // $c_city = str_replace(">", "&gt;", $c_city);
        // $c_city = str_replace(">", "&gt;", $c_city);
        // $c_state = str_replace(">", "&gt;", $c_state);
        // $c_state = str_replace(">", "&gt;", $c_state);
        // $c_pin = str_replace(">", "&gt;", $c_pin);
        // $c_pin = str_replace(">", "&gt;", $c_pin);

        // $sno = $_POST['sno'];
        $existSql = "select * from `contact_us` where cont_email = '$c_email'";
    $result = mysqli_query($conn,$existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError ="Email already exist !";
    }
    else{ 
        if($c_check_out) {
        $hash = password_hash($c_pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `contact_us` ( `cont_first_name`, `cont_last_name`, `cont_email`, `cont_pass`, `cont_address1`, `cont_address2`, `cont_city`, `cont_state`, `cont_pin`, `cont_checkbox`, `cont_time`) VALUES ('$c_first_name', '$c_last_name', '$c_email', '$hash', '$c_address1', '$c_address2', '$c_city', '$c_state', '$c_pin', '$c_check_out', current_timestamp())";
        $result =mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong>  Your information has been added! Please continue  community to response.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        else{
            $c_checkbox = true;
        }
    }
    }
    ?>





    <div class="container my-4">
        <h1 class="text-center">Contact Us</h1>
    </div>
    <hr class="my-4">
    <div class="container my-3" id="container_id">
        <form class="row g-3" id="form_control" action="/forums/contact.php" method="post">
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name"
                        name="cont_first_name" id="cont_first_name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"
                        name="cont_last_name" id="cont_last_name">
                </div>
            </div>
            <div class="col-md-6">
                <label for="cont_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="cont_email" name="cont_email">
            </div>
            <div class="col-md-6">
                <label for="cont_pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="cont_pass" name="cont_pass">
            </div>
            <div class="col-12">
                <label for="cont_address1" class="form-label">Address</label>
                <input type="text" class="form-control" id="cont_address1" name="cont_address1" placeholder="Address">
            </div>
            <div class="col-12">
                <label for="cont_address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="cont_address2" name="cont_address2"
                    placeholder="Current Address">
            </div>
            <div class="col-md-6">
                <label for="cont_city" class="form-label">City</label>
                <input type="text" class="form-control" id="cont_city" name="cont_city">
            </div>
            <div class="col-md-4">
                <label for="cont_state" class="form-label">State</label>
                <select id="cont_state" name="cont_state" class="form-select">
                    <option selected>Other</option>
                    <option>Andhra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chhattisgarh</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                    <option>Haryana</option>
                    <option>Himachal Pradesh</option>
                    <option>Jharkhand</option>
                    <option>Karnataka</option>
                    <option>Madhya Pradesh</option>
                    <option>Telangana</option>
                    <option>Tripura</option>
                    <option>Uttar Pradesh</option>
                    <option>Uttarakhand</option>
                    <option>West Bengal</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="cont_pin" class="form-label">Zip</label>
                <input type="text" class="form-control" id="cont_pin" name="cont_pin">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cont_checkbox" name="cont_checkbox" value="1">
                    <label class="form-check-label" for="cont_checkbox">
                        I agreed..
                        <?php 
                        if($c_checkbox){
                            // echo '<script> alert("Please Press checkbox!");</script>';
                            header("Location: /forums/contact.php");
                        } 
                        ?>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        <div class="card " id="card_id">
            <img src="https://source.unsplash.com/500x400/?code,coding,php" class="card-img-top " alt="...">
            <div class="card-body">
                <p class="card-text">A forum is a place, situation, or group in which people exchange ideas and discuss
                    issues, especially important public issues.
                    Members of the council agreed that it still had an important role as a forum for discussion.
                    The organisation would provide a forum where problems could be discussed.</p>
            </div>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>