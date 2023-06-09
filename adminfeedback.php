<?php
session_start();
if (isset($_SESSION['aid'])) {



?>


    <?php
    $con = mysqli_connect('localhost', 'root', '', 'trip');
    if (isset($_POST['sub'])) {
        $email = $_POST['sub'];
        $exe = mysqli_query($con, "delete from feedback where email='$email'");
    }

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Feedback</title>
        <!-- bootstrap link  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            <?php include "style.css"; ?>
        </style>
    </head>

    <body class="">
        <div class="main-head">
            <div class="container">
                <div class="row pt-3 justify-content-around align-items-center main-nav">

                    <div class="col-lg-7 menu text-center d-none d-lg-block">
                        <ul>
                            <li><a href="adminindex.php">Home</a></li>
                            <li><a href="adminpackages.php">packages</a></li>
                            <li><a href="adminfeedback.php">Feedback</a></li>
                            <li><a href="adminbooking.php">Booking</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-10 text-end ">
                        <div class="d-none d-lg-block">
                            <i class="bi bi-person-circle text-light h4"></i>
                            <span class="text-light lead ms-2"> <?php echo $_SESSION['aname']; ?></span>
                        </div>
                        <div class="d-lg-none " onclick="side_bar()">
                            <i class="bi bi-list text-light" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>


        <!-- feedback -->

        <div class="container">
            <div class="text-center display-5 gradient-text">Feedback</div>
            <div class="">
                <!-- <p style="width:1024px;background-color:aqua;height:20px;"></p> -->


                <div class="feedbody">

                    <table class="table table-bordered table-dark table-striped table-hover" style="width:1296px">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>contact</th>
                            <th>feed</th>
                            <th>Remove</th>
                        </tr>



                        <?php

                        $exe = mysqli_query($con, "SELECT * FROM feedback");
                        if ($exe) {
                            while ($row = mysqli_fetch_array($exe)) {


                        ?>

                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['feed']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <button type="submit" value="<?php echo $row['email']; ?>" name="sub" class="btn btn-danger px-3">Remove</button>
                                        </form>
                                    </td>
                                </tr>







                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>


            </div>
        </div>
        <!-- toggle-bar  -->
        <div id="toggle-bar" class="px-3">

            <ul>
                <li>
                    <i class="bi bi-person-circle text-light h4 "></i>
                    <span class="text-light" style="font-size: 20px;">
                        <?php
                        echo $_SESSION['aname'];

                        ?>

                    </span>
                </li>
                <li><a href="adminindex.php">Home</a></li>
                <li><a href="adminfeedback.php">Feedback</a></li>
                <li><a href="adminbooking.php">Booking</a></li>
                <li><a href="adminpackages.php">packages</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <script>
            <?php
            include "adminscript.js";
            ?>
        </script>

    </body>

    </html>
<?php

} else {
    header("location:login.php");
}
?>