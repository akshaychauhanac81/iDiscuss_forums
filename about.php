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
    body {
        /* background-color:darkgreen ; */

    }

    #ques {

        min-height: 90vh;
    }

    #image1_id {
        width: 20rem;
        height: 15rem;
    }

    #image2_id {
        width: 20rem;
        height: 15rem;
        /* position: relative; */
        /* bottom: 19pc; */
    }
    </style>
</head>

<body class="bg-success">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_navbar.php'; ?>
    <div class="container " id="ques">
        <h1 class="text-center ">About Us</h1>
        <div class="container my-4">
            <div class="text-center  " style="padding: 4px 100px; font-family: cursive;">
                <p>A Web forum is a website or section of a website that allows visitors to communicate with each other
                    by posting messages. Most forums allow anonymous visitors to view forum postings, but require you to
                    create an account in order to post messages in the forum. When posting in a forum, you can create
                    new topics (or "threads") or post replies within existing threads.
                    NOTE: Web forums are also called Internet forums, discussion boards, and online bulletin boards.
                </p>
            </div>
            <img src="imgs/about1.jpg" class="rounded float-start rounded-circle" alt="Please wait..." id="image1_id">

            <img src="imgs/about3.jpg" class="rounded float-end rounded-circle" alt="please wait..." id="image2_id">
            <!-- <img src="imgs/about1.jpg" class="img-fluid" alt="Please Wait..." id="image1_id"> -->
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