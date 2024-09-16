<?php
include("header.php");
include("connection.php");

?>
    <main class="app-content">
              <!-- Facts Start -->
    <div class="container-fluid facts pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0 mx-3"> Job Availaible</h5>
                            <h1 class="text-white mb-0 mx-3" data-toggle="counter-up"><?php 
                                $sql = "SELECT office_name FROM vacancies ORDER BY id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0 mx-3">Offices Join Us</h5>
                            <h1 class="mb-0 text-primary mx-3"  data-toggle="counter-up"><?php 
                                $sql = "SELECT username FROM office_req ORDER BY id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0 mx-3">Happy Users</h5>
                            <h1 class="text-white mb-0 mx-3" data-toggle="counter-up"><?php 
                                $sql = "SELECT username FROM user_login ORDER BY id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->
  
    </main>
