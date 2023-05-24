<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "trip");
$exe = mysqli_query($con, "SELECT * FROM packages");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- this is a head -->
    <!-- hello -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Made-A-Trip</title>
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        <?php
        include "style.css";
        ?>
    </style>

</head>

<body>
    <div class="main-head">
       
        <div class="container">
            <div class="row  justify-content-around align-items-center main-nav ">

               
                <div class="col-lg-7 menu text-center d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="booking_status.php">Booking Status</a></li>
                        <li>
                            <span class="info">
                                <span id="bar" class="text-light">Join Us</span>
                                <div class="info-content">
                                    <div> <a href="login.php" class="text-light">Login</a></div>
                                    <hr>
                                    <div><a href="registration.php" class="text-light">signup</a></div>
                                 
                                    <hr>
                                    <div><a href="logout.php" class="text-light">Logout</a></div>
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- toggle bar -->
            <div id="toggle-bar">
               
                <ul>
                    <li> 
                    <i class="bi bi-person-circle text-light h4 ">
                        <span class="text-light" style="font-size: 20px;">
                        <?php

                        if (isset($_SESSION['id'])) {
                            echo $_SESSION['name'];
                        }

                        ?> 
                        
                    </span>    
                </i></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="booking_status.php">Booking status</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">sign up</a></li>
                </ul>
            </div>



                <div class="col-lg-3 text-end d-none d-lg-block" >
                <i class="bi bi-person-circle text-light h4 "></i>
                <span class="text-light" style="font-size: 20px;">
                        <?php

                        if (isset($_SESSION['id'])) {
                            echo $_SESSION['name'];
                        }

                        ?> 
                        
                    </span>    
                    
                </div>

                <div class="col-4 text-end d-lg-none  " onclick="side_bar()">
                    <h1 class=""><i class="bi bi-list text-light" ></i></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="images">
        <img src="images\SafdarJang Tomb.jpg" class="imgs" alt="">
        <img src="images\Gandhi Smiriti.jpg" class="imgs" alt="">
        <img src="images\Humayun Tomb.jpg" class="imgs" alt="">
        <img src="images\Indiagate.jpg" class="imgs" alt="">
        <img src="images\Purana Quila.jpg" class="imgs" alt="">
        <img src="images\Qutub Minar.jpg" class="imgs" alt="">
        <img src="images\Jama Masjid.jpg" class="imgs" alt="">
        <img src="images\Lal Quila.jpg" class="imgs" alt="">
        </div>
            <!-- header content  -->
            <div class="container">
            <div class="header-content text-light text-lg-right  mt-4 first">
                <p class="display-4 pt-4 text-center text-uppercase fw-bold">Discover</p>
                <p class="lead text-center" data-aos="fade-up">
                    the World
                  
                </p>  
                <p class="text-center"><a href="#package" class="px-5 pt-2 ">Book</a href="#package"></p>  
            </div>
        </div>

    </div>
    
    
    <!-- search box -->
    <div class="pt-4 row justify-content-center aling-items-center forth">
        <div class="col-lg-8 col-md-12">
            <form action="" method="post">
                <div class="row mb-4 justify-content-center">
                    <input type="text" class="fifth col-8" placeholder="Search here" name="search">
                    <button class="input-group-text col-1 text-center" id="basic-addon1 " name="sub" value="submit"><i class="bi bi-search"></i></button>
                    
                </div>
            </form>
        </div>
    </div>
    <!-- packages to book  -->
    <p class="display-5 my-4 text-center sixth">
        <span>
            We have the Best Tour
        </span>
        <br>
        <span>
        Let us plan you a perfect India Holiday 
        </span>
 
    </p>

    <div class="card-div container" id="package">

        <div class="row justify-content-lg-between justify-content-sm-center ">
            <?php
            if(isset($_REQUEST['sub'])){
                $name=$_POST['search'];
                $e=mysqli_query($con,"select * from packages where name like '$name%'");
                while($r = mysqli_fetch_array($e)){
                          
            
            ?>

    <div class="forcard col-lg-4 col-md-5 col-sm-10 mb-4" style="height:600px;">
                    <div class="card card-seventh">
                        <img src="images/<?php echo $r['name']; ?>.jpg" alt="" class="card-img-top" style="height:250px;">
                        <div class="card-body" data-aos="fade-up">
                            <h5 class="card-title"><?php echo $r['name']; ?></h5>

                            <?php echo $r['description']; ?>
                            <br>
                            <div class="row justify-content-between align-items-center">
                                <a href="<?php echo "booking.php?c=" . $r['id']; ?>" class="btn mx-2 my-3 col-4 card-button">Book</a>
                                <span class="col-3 text-darker fw-bold" style="position: absolute;bottom:25px;right:4px;"><?php echo $r['cost']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            }
            }else{
            while ($row = mysqli_fetch_array($exe)) {


            ?>
                <div class=" col-lg-4 col-md-6 col-sm-10 mb-4" >
                    <div class="card card-seventh" >
                        <img src="images/<?php echo $row['name']; ?>.jpg" alt="" class="card-img-top" style="height:250px;">
                        <div class="card-body" data-aos="fade-up">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                             <p class="small">   
                            <?php echo $row['description']; ?>
                             </p>
                            <br>
                            <div class="row justify-content-between align-items-center">
                                <a href="<?php echo "booking.php?c=" . $row['id']; ?>" class="btn mx-2 my-3 col-4 card-button">Book</a>
                                <span class="col-3 text-darker fw-bold" style="position: absolute;bottom:25px;right:4px;">Rs <?php echo $row['cost']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
            ?>
        </div>
    </div>
    </div>
    </div>

    <hr>
    <!-- feedback  -->
    <div class="container">
        <p class="display-4 text-center gradient-text">Feedback</p>
        <div class="row justify-content-center alingn-items-center ">
            <?php

        $fe = mysqli_query($con, "SELECT * FROM feedback");

        while ($r = mysqli_fetch_array($fe)) {


        ?>
            <div class="p-3 col-lg-10 col-md-8 col-sm-8 
             mx-2">
                <p class="h3"><i class="bi bi-person-circle me-2"> </i><?php echo $r['name'] ?></p>
                <p><?php echo $r['feed'] ?></p>
            </div>
            <hr>

        <?php
        }
        ?>
        </div>
    </div>




    <!-- footer  -->
    <div class="bg-dark text-light ">
        <div class="container ">
            <div class="row justify-content-between align-items-center mt-4">
                <div class="col-lg-6 mt-4">
                    <p class="h4"><u>About us</u></p>
                    <p class="muted">
                    Our dedicated travel team diligently works round-the-clock to design the best travel experiences for the customers. The skilled team spends considerable amounts of time ideating tour packages that guarantee to make travelling with us an experience like no other. We select the finest hotels in every category, boast an excellent personal fleet of vehicles for transportation.
                    </p>
                </div>
                <div class="col-lg-4 mt-4">
                <p class="h4"><u>Join us</u></p>
                    <ul>
                        <li class="d-inline"><i class="bi bi-facebook me-2"></i>facebook</li><br>
                        <li class="d-inline"><i class="bi bi-instagram me-2"></i></i>instagram</li><br>
                        <li class="d-inline"><i class="bi bi-whatsapp me-2"></i>whatsapp</li><br>
                        <li class="d-inline"><i class="bi bi-linkedin me-2"></i></i>linkedin</li><br>

                    </ul>
                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center text-light font-weight-bold">Copyright 2023 &copy; Made A Trip</p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
    <script>
        <?php
        include "script.js";
        ?>
    </script>

</body>

</html>