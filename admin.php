<?php
session_start();
$con=mysqli_connect("localhost","root","");
// if(!isset($_SESSION['user'])){
//   header('location:login-form.php');
// }else{
//   header('location:admin.php');
// }
include('config.php');
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

    <title>Admin Panel</title>

    <link rel="stylesheet" type="text/css" href="css/admin-style.css" />

    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
  </head>
  <body class="">
    <nav class="bg-primary text-white d-flex">
      <div class="logo d-flex">
        <img src="images/home.png" height="30px" />
        <h5 style="margin-top: 0.3rem; margin-left: 0.4rem">ADMIN PANEL</h5>
      </div>

      <div class="d-flex center">
        <img
          onclick="openFullscreen();"
          src="images/full-screen.png"
          height="18px"
        />

        <img style="margin-top: 0.5rem" src="images/search.png" height="18px" />

        <img style="margin-top: 0.5rem" src="images/menu.png" height="18px" />

        <div class="dropdown">
          <button
            class="btn btn-warning p-1 dropdown-toggle"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Dropdown Menu
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>

      <div class="d-flex my-auto">
        <p class="my-auto px-1 text-capitalize">Admin: <?php echo $_SESSION['user'];?></p>
        <a href="logout.php">
          <img
            style="float: right; margin-top: 0.1rem"
            src="images/power-button.png"
            height="28px"
          />
        </a>
      </div>
    </nav>

    <header class="d-flex">
      <section class="left_sec bg-secondary">
        <div class="side_menu">
          <div class="heading">
            <h6>MAIN NAVIGATION</h6>
          </div>
          <div class="side_option">
            <div class="d-flex">
              <img src="images/speedometer.png" height="20px" />
              <a href="#">
                <p>Dashboard</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/google-forms.png" height="20px" />
              <a href="#">
                <p>Forms</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/bar-chart.png" height="20px" />
              <a href="#chart">
                <p>Charts</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/message.png" height="20px" />
              <a href="#">
                <p>Mailbox</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/table.png" height="20px" />
              <a href="#table">
                <p>Tables</p>
              </a>
            </div>
          </div>

          <div class="heading">
            <h6>COMPONENTS</h6>
          </div>
          <div class="side_option">
            <div class="d-flex">
              <img src="images/map.png" height="20px" />
              <a href="#maps">
                <p>Maps</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/sitemap.png" height="20px" />
              <a href="#">
                <p>Widgets</p>
              </a>
            </div>
            <div class="d-flex">
              <img src="images/calendar.png" height="20px" />
              <a href="#">
                <p>Calendar</p>
              </a>
            </div>
          </div>

          <div class="side_option">
            <img src="images/admin.png" width="80px" alt="" />
            <p>Admin Name:</p>
            <p class="text-capitalize"><?php echo $_SESSION['user'] ?></p>
          </div>
        </div>
      </section>
      <section class="right_sec">
        <div class="shadow-lg bg-white py-4 row">
          <div class="p-3 mx-auto col-lg-6 col-md-6 col-sm-12">
            <form class="w-75 mx-auto" method="post" enctype="multipart/form-data">
            <h3>Add Products</h3>
              <div class="form-group">
                <label>Product Image</label>
                <input type="file" class="form-control" name="img" />
              </div>
              <br />
              <div class="form-group">
                <label>Product Description</label>
                <input type="text" class="form-control" name="des" />
              </div>
              <br />
              <div class="form-group">
                <label>Product Title</label>
                <input type="text" class="form-control" name="title" />
              </div>
              <br />
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" name="price" />
              </div>
              <br />
              <div class="form-group">
                <label>Product Rating</label>
                <input type="text" class="form-control" name="rating" /><br>  
              </div>
              <br />
              <input type="submit" name="insert" class="btn btn-warning" />
              <br />
              <br />
              <div class="form-group">
                <label>Remove Product </label>
                <div class="d-flex">
                  <input
                    type="text"
                    placeholder="Enter Product Code"
                    class="form-control"
                    name="del"
                  /><br />
                  <input
                    type="submit"
                    name="delete"
                    class="btn btn-outline-danger"
                    value="Remove"
                  />
                  <input type="submit" value="View All Products" class="btn btn-outline-primary ml-2" name="selectall">
                </div>
              </div>
            </form>

            <?php
            if(isset($_POST['insert'])){
              $con=mysqli_connect("localhost","root","");
              mysqli_select_db($con,"productdb");
              $target = "primg/";
              $target = $target . basename($_FILES['img']['name']); 
              $pic=($_FILES['img']['name']);
              $desc=$_POST['des'];
              $title=$_POST['title'];
              $price=$_POST['price'];
              $rating=$_POST['rating'];
              $code=$_POST['code'];
              $query=" INSERT INTO items VALUES('$pic', '$desc', '$title', '$price', '$rating', '$code') ";
              $data=mysqli_query($con,$query);
                         

              if(move_uploaded_file($_FILES['img']['tmp_name'],$target))
              { 
              echo "Photo Uploaded Succesfully"; 
              }
              else
              {
              echo "Sorry, there was a problem uploading your file."; 
              }
            }

            
    if(isset($_POST['delete']))
    {
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"productdb");
        $delete = $_POST['del'];
        $delquery="delete from items where code='$delete'";
        mysqli_query($link,$delquery);
        echo "record deleted";
    }

    if(isset($_POST['update']))
    {
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"productdb");
        $target = "primg/";
        $target = $target . basename($_FILES['img']['name']);               
        $img = ($_FILES['img']['name']);
        $des = $_POST['des'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $rating = $_POST['rating'];
        $code = $_POST['code'];
        $prdupd = $_POST['del'];

        $updquery="update items set photo=$img,desc='$des',title='$title',price='$price',rating='$rating',code='$code' where code='$prdupd'";
        mysqli_query($link,$updquery);
        echo "record updated";
    }
    
            ?>


          </div>
          <div class="my-auto col-lg-6 col-md-6 col-sm-12">
            <div>
              <img src="images/png.jpg" width="500px" class="img-fluid" />
            </div>
          </div>
        </div>

        <div id="table" class="bg-white"> 
          
          <div class="container">
          <?php
          $result = mysqli_query($con,"SELECT * FROM `items`");
          while($row = mysqli_fetch_assoc($result)){
          ?> 
          <form action="" method="post">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Prd_Image</th>
              <th scope="col">Description</th>
              <th scope="col">Prd_Title</th>
              <th scope="col">Prd_Price</th>
              <th scope="col">Prd_Rating</th>
              <th scope="col">prd_Code</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td><img
                class="card-img-top image"
                src="primg/<?php echo $row['photo']; ?>"
              /></td>
              <td><?php echo $row['desc']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td>₹
                    <?php echo $row['price']; ?></td>
              <td><?php echo $row['rating']; ?></td>
              <td><?php echo $row['code']; ?></td>
            </tr>
          </tbody>
          
        </table>        
        </form>
        <?php
         }
	      	mysqli_close($con);
	    	?>
          </div>
          
        </div>
        

        
      </section>
     
    </header>
    <script>
      var elem = document.documentElement;
      function openFullscreen() {
        if (elem.requestFullscreen) {
          elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
          /* Safari */
          elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
          /* IE11 */
          elem.msRequestFullscreen();
        }
      }
    </script>
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
