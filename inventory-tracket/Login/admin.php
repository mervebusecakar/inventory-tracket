<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="its";

$conn = new mysqli($servername,$username,$password,$dbname);

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HKU-ITS</title>
    <link rel="stylesheet" href="stylesMain.css" text="text/css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="logo"><img  src="hku-logo.png" alt="" width="70px" height="70px" ></span>HKU-ITS</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                    <span>Admin Panel</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span>
                    <span>Requests</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Awaiting Requests</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span></span></a>
                </li>
                <li>
                    <a href=""><span class="las la-receipt"></span>
                    <span></span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span></span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span></span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" width="30px" height="30px" alt="">
                <div>
                    <h4>
                        <?php


                            echo $_SESSION["adminname"]
                        ?>
                    </h4>
                    <small>Settings</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                                echo $_SESSION["totalRequests"]
                            ?>
                        </h1>
                        <span>All Requests</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php
                                echo $_SESSION["totalRequestsA"]
                            ?>
                        </h1>
                        <span>Requested Ones</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>
                        <?php
                                echo $_SESSION["totalRequestsNotA"]
                            ?>
                            </h1>
                        <span>Awaiting Request</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        
                        <div class="card body">
                        
                        </div>

                    </div>
                </div>
            
            </div>
        </main>
    </div>
</body>
</html>