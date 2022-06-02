<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Quicksand&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="dist/style.css">

    <title>Photo A DAY</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark py-2" aria-label="Tenth navbar example">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php#gallery">Gallery</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active" style="aria-current="page" href="#">Photo A Day</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#gallery">Contact</a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>
<!-- end navbar  -->

<!-- carousel -->




<div class="slider bg-secondary">
<div class="center">
<?php
            include_once 'dbh.php';

            $sql = "SELECT * FROM photos ORDER BY orderPhotos DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
              echo "SQL statement failed";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo '<div><a href="uploads/'.$row["fileFullNamePhotos"].'" data-lightbox="photos" data-title="'.$row["titlePhotos"].' | '.$row["datePhotos"].'"><img class="img-fluid slide-image" src="uploads/'.$row["fileFullNamePhotos"].'"></a></div>';
              
              }
            }

            ?>
</div>
</div>







<!-- end carousel -->


  <!--hero section  -->
  <div class="container col-xxl-8 px-4 py-5 todayWidth">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-lg-6 justify-content-md-center">
        <?php 
        include_once 'dbh.php';

        $sql = "SELECT * FROM photos ORDER BY orderphotos desc limit 0,1;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
          echo "SQL statement failed";
        } else {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          $row = mysqli_fetch_assoc($result);
            echo '<img src="uploads/'.$row["fileFullNamePhotos"].'" class="d-block mx-lg-auto  img-fluid img_center today" alt="Most recent photo" width="700" height="500" loading="lazy">';
            
          
        }
        ?> 
        
      </div>
      <div class="col-lg-6 small_center">
        <h1 class="display-5 fw-bold lh-1 mb-3 ">Todays Photo</h1>
        <p class="lead">... or most recentently uploaded</p>
        <div class="d-grid gap-2 d-md-flex justify-content-lg-start justify-content-md-center ">
            <a href="index.php#gallery" class="btn btn-dark btn-lg px-4 me-md-2" role="button">Gallery</a>
            <a href="index.php#gallery" class="btn btn-outline-secondary btn-lg px-4" role="button">Favorites</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end hero -->




<!--Gallery-->
<div class="photo-gallery bg-dark">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" id="gallery">All Photos</h2>
        
        </div>
        <div class="row photos ">

            <?php
            include_once 'dbh.php';

            $sql = "SELECT * FROM photos ORDER BY orderPhotos DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
              echo "SQL statement failed";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-sm-6 col-md-4 col-lg-3 item"><a href="uploads/'.$row["fileFullNamePhotos"].'" data-lightbox="photos" data-title="'.$row["titlePhotos"].' | '.$row["datePhotos"].'"><img class="img-fluid" src="uploads/'.$row["fileFullNamePhotos"].'"></a></div>';
              
              }
            }

            ?>
        </div>
    </div>
</div>
<!-- end hero -->




<!-- favorite photos section -->




<!-- end fav photos-->



<!-- footer -->
<!-- Footer -->
<footer class="footer-light bg-light py-2">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href=""> Michael Bourlotos</a>
    <a href="secure/uploads.php" style="text-decoration: none; color: #f7f7f7;"  class="upload">Upload</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- end footer -->
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  

<script src="js/lightbox.min.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
        $('.center').slick({
          centerMode: true,
          arrows: true,
          
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true ,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
        });
</script>		



</body>
</html>
