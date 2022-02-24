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
    #maincontainer{
        min-height: 100vh;
    }
    </style>
    <title> Welcome to iDiscuss - codes | forums </title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>
    <div class="container my-3 col-md-7" id="maincontainer">
        <h1 class="py-3">Search result for <em>" <?php  echo $_GET['search']?>"</em></h1>
        <?php  
        $noresult = true;
        $query = $_GET['search'];
        $sql = "select * FROM thread_table where match (thread_title,thread_desc) against('$query')";
        $result =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
        $title= $row['thread_title'];
        $desc= $row['thread_desc'];
        $thread_id = $row['thread_id'];
        $url = "thread.php?threadid=".$thread_id;

                $noresult = false;

                echo '<div class="result my-4">
                    <h4><a href="'. $url .'" class="text-dark">'. $title .'</a></h4>
                    <p>'. $desc .'</p>
                </div>';
        }
        if($noresult){
            echo'<div class="jumbotron.jumbotron-fluid">
            <div class="container">
               <div class="h-80  p-4 bg-light border rounded-3">
                   <p class="display-5">No Result Found</p>
                   <p class="lead">Suggestion: <ul>
                   <li>Make sure that all words are spelled correctly.</li>
                   <li>Try different keywords.</li>
                   <li>Try more general keywords.</li>
                   <li>Try fewer keywords.</li>
                   </ul></p>
                   
               </div>
            </div>
          </div>';
        }

        ?>

        
    </div>
    <div class=" my-3 col-md-4" style="">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <!-- <span class="sr-only">Previous</span> -->
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <!-- <span class="sr-only">Next</span> -->
                    </a>
                </li>
            </ul>
        </nav>
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