<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
    #ques {
        min-height: 533Px;
    }
    </style>
    <title> Welcome to iDiscuss - codes | forums </title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categories_id=$id";
    $result =mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
     $catname= $row['categories_name'];
     $catdesc= $row['description'];
    }
    ?>

    <?php
    $showAlert=false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // insert database in data connection
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `thread_table` (`thread_title`, `thread_desc`, `thread_cate_id`, `thread_user_id`, `time_stamp`) VALUES ('$th_title', '$th_desc','$id', '$sno', current_timestamp())";
    $result =mysqli_query($conn,$sql);
    $showAlert=true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success !</strong>  Your thread has been added! Please wait for community to response.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    }
    ?>
    <!-- categories Start here -->
    <div class="container my-3 text-success">
        <div class="jumbotron col-md-7 py-4 mx-auto bg-light">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forums No Spam / Advertising / Self-promote in the forums. Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Do not PM users asking for help. Remain respectful of other members at all times. </p>
            <a href="#" class="btn btn-success btn-lg" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      echo '<div class="container col-md-6 mx-auto ">
             <h1 class="py-2">Start a Discussions</h1>
             <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Problem title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                 </div>
                 <input type="hidden" name="sno" value="'. $_SESSION["sno"] .'">
                 <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Elaborate Your Concern</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                 </div>
                 <button type="submit" class="btn btn-success">Submit</button>
             </form>
       </div>';
    }
    else{
        echo'<div class="container col-md-6 mx-auto">
              <h1 class="py-2">Start a Discussions</h1>
              <p class="lead">You can not logged in. Please login to be able to a start Discussions.  </p>
            </div>';
    }
    ?>
    <div class="container col-md-6 mx-auto mb-5 " id="ques">
        <h1 class="py-2">Browser Questions</h1>
        <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `thread_table` WHERE thread_cate_id=$id";
    $result =mysqli_query($conn,$sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
     $noResult = false;
        $id= $row['thread_id'];
     $title = $row['thread_title'];
     $desc = $row['thread_desc'];
     $thread_time = $row['time_stamp'];
     $thread_user_id = $row['thread_user_id'];
     $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
     $result2 = mysqli_query($conn, $sql2);
     $row2 = mysqli_fetch_assoc($result2);

     
    echo '<div class="media my-3 ">
        <img src="imgs/userdefault.png" width="54px" height="46px" class="mr-3" alt="...">
        <p class="font-weight-bold my-0">Asked by: <b> '. $row2['user_name'] .'</b> at <b>'. $thread_time .'</b></p>
        <div class="media-body my-3 mx-2">
        
            <h5 class="mt-0"><a class="text-dark text-decoration-none" href="thread.php?threadid='. $id.'">'. $title.'</a></h5>
            '. $desc.'
        </div>
    </div>';
}
   if($noResult){
       echo '<div class="jumbotron.jumbotron-fluid">
              <div class="container">
                 <div class="h-80  p-4 bg-light border rounded-3">
                     <p class="display-5">No Threads Found</p>
                     <p>Be the first person to ask the Question.</p>
                     
                 </div>
              </div>
            </div>';
   }

?>
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