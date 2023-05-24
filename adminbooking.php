<?php
session_start();
if (isset($_SESSION['aid'])) {


?>


    <?php
    $con = mysqli_connect("localhost", "root", "", "trip");

    if (isset($_REQUEST['confirm'])) {
        $id = $_POST['confirm'];
        $up = mysqli_query($con, "update booking set status='confirm' where b_id='$id'");
        if ($up) {
            echo "<script>alert('updated successful');</script>";
        } else {
            echo "<script>alert('update failed');</script>";
        }
    }
    if (isset($_REQUEST['cancel'])) {
        $id = $_POST['cancel'];
        $up = mysqli_query($con, "update booking set status='cancel' where b_id='$id'");
        if ($up) {
            echo "<script>alert('updated successful');</script>";
        } else {
            echo "<script>alert('update failed');</script>";
        }
    }



    if (isset($_REQUEST['done'])) {
        $id = $_POST['done'];
        echo $id;
        $up = mysqli_query($con, "update booking set payment_status ='done' where b_id='$id'");
        if ($up) {
            echo "<script>alert('updated successful');</script>";
        } else {
            echo "<script>alert('update failed');</script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Booking</title>
        <!-- bootstrap link  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            <?php include "style.css"; ?>
        </style>
    </head>

    <body>
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
        <br>
        <div class="container">
            <div class="text-center mt-5">
                <span class="h1 gradient-text">Enter Id To Check Payment Status</span>
                <br>
                <form action="" method="post" class="mb-4 button">
                    <input type="text" name="check">
                    <button class="btn btn-primary px-3 b" value="sub" name="sub">Check</button>
                </form>
            </div>
            <div class="feedbody ">
                <div style="overflow-x: scroll;">
                <table  class="table table-bordered table-dark table-striped table-hover" style="width:1296px">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Family Member</th>
                        <th>Cost</th>
                        <th>Packages</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Booking date</th>
                        <th>Tour Date</th>
                        <th>Boking status</th>
                        <th>Payment</th>
                    </tr>



                    <?php
                    if (isset($_POST['sub'])) {
                        $ch = $_POST['check'];
                        $check = mysqli_query($con, "SELECT * FROM booking where customer_id=$ch and payment_status='none'");
                        while ($r = mysqli_fetch_array($check)) {
                            if ($r) {

                    ?>


                                <tr>
                                    <td><?php echo $r['b_id']; ?></td>
                                    <td><?php echo $r['name']; ?></td>
                                    <td><?php echo $r['family_mem']; ?></td>
                                    <td><?php echo $r['cost']; ?></td>
                                    <td><?php echo $r['package']; ?></td>
                                    <td><?php echo $r['contact']; ?></td>
                                    <td><?php echo $r['address']; ?></td>
                                    <td><?php echo $r['booking_date']; ?></td>
                                    <td><?php echo $r['tour_date']; ?></td>
                                    <td><?php echo $r['status']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-success confirm px-3" value="<?php echo $r['b_id']; ?>" name="done">Done</button>
                                        </form>
                                    </td>
                                </tr>

                    <?php
                            }
                        }
                    }
                    ?>
                </table>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="text-center h1 my-2 gradient-text">Customer Booking</div>
        </div>
        <div class="container">

            <div class="feedbody">

                <table  class="table table-bordered table-dark table-striped table-hover" style="width:1296px">
                    <tr>
                        <th>Id</th>
                        <th>Nmae</th>
                        <th>Family Member</th>
                        <th>Cost</th>
                        <th>Packages</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Booking date</th>
                        <th>Tour Date</th>
                        <th>Confirm</th>
                        <th>Cancel</th>
                    </tr>


                    <?php
                    $exe = mysqli_query($con, "SELECT * FROM booking where status='wait for confirmation'");
                    while ($row = mysqli_fetch_array($exe)) {

                    ?>



                        <tr>
                            <td><?php echo $row['b_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['family_mem']; ?></td>
                            <td><?php echo $row['cost']; ?></td>
                            <td><?php echo $row['package']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['booking_date']; ?></td>
                            <td><?php echo $row['tour_date']; ?></td>
                            <td>
                                <form action="" method="post" class="col-1">
                                    <button class="btn confirm btn-success px-3" value="<?php echo $row['b_id']; ?>" name="confirm">Confirm</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post" class="col-1">
                                    <button class="btn btn-danger px-3" value="<?php echo $row['b_id']; ?>" name="cancel">Cancel</button>
                                </form>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>


        </div>
        <br>

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