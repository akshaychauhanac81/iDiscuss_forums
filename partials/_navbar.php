<?php

session_start();


echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/forums">iDiscuss</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/forums">Home</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Top Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

            $sql ="SELECT categories_name, categories_id FROM `categories` LIMIT 3";
            $result =mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){

              echo'<li><a class="dropdown-item" href="threadlist.php?catid='. $row['categories_id'] .'">'. $row['categories_name'] .'</a></li>';

            }

          echo  '</ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact</a>
          </li>
        </ul>
        <div class="mx-2">';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo'<form class="d-flex my-2 my-lg-0" style="height: 37px" action="search.php" method="get">
                <p class="text-light my-0 mx-1">Welcome '. $_SESSION['useremail'] .'</p>
                <input class="form-control me-2 rounded-pill" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success rounded-pill" type="submit">Search</button>
                <a href="partials/_logOut.php" class="btn btn-outline-success mx-2">LogOut</a>
                
                </form>';
        }
        else{
              echo '<button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                  <button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                  </div>

               <form class="d-flex">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success rounded-pill" type="submit">Search</button>
               </form>';
           }
     echo '</div>
    </div>
    </nav>';
    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';
    if(isset($_GET['signUpsuccess']) && $_GET['signUpsuccess']=="true"){
      echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success !</strong> You can login now.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if(isset($_GET['signUpsuccess']) && $_GET['signUpsuccess']=="false"){
      echo' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Wrong User_email !</strong> Please already exist.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
?>