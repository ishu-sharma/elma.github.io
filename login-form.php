<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <title>Login Page</title>
    
    <!-- Font Awesome Link -->
    <script
      src="https://kit.fontawesome.com/c6e799eca5.js"
      crossorigin="anonymous"
    ></script>

    <!-- css -->
    

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&display=swap");
        *{
            font-family: "Josefin Sans", sans-serif;
        }
        .parent_div{
            width:100vw;
            height:100vh;
            display:grid;
            place-items:center;
        }

        .btns{
            padding: 0.55rem 3rem;
            border-color: transparent;
            transition: all 0.3s ease;
            border: 1px solid;
            background-color:#ff9b00;
            color: #fff;
        }

      
      .btns:hover {        
        background-color: #fff;
        color:#ff9b00;
        border-color:#ff9b00;
      }
    </style>
  </head>
  <body>
    <div class="parent_div">
    <div class="p-2 row container">
    <div class="col-lg-6 col-md-6 col-sm-12 text-center my-auto">
        <h2 class="display-3">Login Here</h2>
        <form class="p-3 " action="validation.php" method="post">
            <div class="form-group ">
                <input type="text" name="name" class="w-50 form-control mx-auto" placeholder="Enter Your Name">
            </div>
            <br>
            <div class="form-group">
                <input type="password" name="pass" class="w-50 form-control mx-auto" placeholder="Enter Your Password">
            </div>
            <br>   
            <input type="submit" class="btns" value="Login">
            <br><br>
            <p>Don't have a account. <a href="signup.php"> Signup Here</a></p>
        </form>
        
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
    <img src="images/log.svg" class="img-fluid" alt="">
    </div>
    </div> 
    </div> 

    <script src="js/"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
