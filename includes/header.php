<?php
  //This includes the session file. This file contains code that starts/resumes a new session
  //By having it in the header file, it will be included on every page, allowing session capability to be used on 3every page across the website
  include_once 'includes/session.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />


    <!-- Bootstrap CSS -->
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
     crossorigin="anonymous">

    <link rel="stylesheet" href="css/site.css"/>
    -->
    
    <title>choir management - <?php echo $title ?> </title>
  </head>
  <body>
    <div class="container">
   

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Choir membership</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewrecords.php">View Choir Members</a>
            </li>
            
            <!--
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            -->
          </ul>

          <ul class="navbar-nav ml-auto">
          
            <?php 
              if(!isset($_SESSION['userid'])) {
            ?>
              
              <li class="nav-item">       
                <a class="nav-link" aria-current="page" href="login.php" >Login</a>
              </li>

            <?php } else { ?>
              
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"> 
                <span> Hello <?php echo $_SESSION['username'] ?>! </span> </a>
                
                <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
              </li>

            <?php } ?> 

          </ul>

        </div>
      </div>
    </nav>

    <br/>


<!--
    <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewrecords.php">View Choir Members</a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          
          </ul>

-->