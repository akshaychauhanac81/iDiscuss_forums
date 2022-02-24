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
            #ques{
                min-height: 433Px;
            }

        </style>
    <title> Welcome to iDiscuss - codes | forums </title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>
    <div class="contain text-center my-3 text-success">
        <h1>Welcome to iDiscuss Forums</h1>
    </div>
    <!-- Start Slider to here -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="height:27rem">
            <div class="carousel-item active ">
                <img src="imgs/slido-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slido-8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slido-5.jpg" class="d-block w-100" alt="...">
            </div> 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- categories Start here -->
    <div class="container my-4 " id="ques">
        <h1 class="text-center text-success my-4">iDiscuss Browser-Categories Forums</h1>
        <div class="row my-4">
          <!-- Fetch all the categories  -->
          <!-- Use a loop iterate categories -->
          <?php
          $sql = "SELECT * FROM `categories`";
          $result =mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['categories_id'];
            $cat = $row['categories_name'];
            $desc = $row['description'];

            echo '<div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x400/?'.$cat.',coding,php" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-success"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                    <p class="card-text">'.substr($desc,0,100).'....</p>
                    <a href="threadlist.php?catid='.$id.'" class="btn btn-success">View Source</a>
                </div>
            </div>
        </div>';
          }
          ?>
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