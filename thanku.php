<?php
session_start();

// $_SESSION['man'] = filter_input(INPUT_POST, 'name');
// $_SESSION['tec'] = filter_input(INPUT_POST, 'phone');
// $_SESSION['des'] = filter_input(INPUT_POST, 'email');

if (isset($_POST['des']) && $_POST['des'] == 'Yes') {
    $_SESSION['des'] = "Yes";
} else {
    $_SESSION['des'] = "No";
}
if (isset($_POST['man']) && $_POST['man'] == 'Yes') {
    $_SESSION['man'] = "Yes";
} else {
    $_SESSION['man'] = "No";
}
if (isset($_POST['tec']) && $_POST['tec'] == 'Yes') {
    $_SESSION['tec'] = "Yes";
} else {
    $_SESSION['tec'] = "No";
}

// echo $_SESSION['email'];

if (!isset($_SESSION['name']) or !($_SESSION['phone']) or !($_SESSION['email']) or !($_SESSION['regno']) or !($_SESSION['why'])) {
    header("Location: index.php");
} else if ($_SESSION['man'] == "No" and $_SESSION['tec'] == "No" and $_SESSION['des'] == "No") {
    header("Location: domain.php");
} else {

    // echo "here";
    $name = $_SESSION['name'];
    $number = $_SESSION['phone'];
    $email = $_SESSION['email'];
    $regno = $_SESSION['regno'];
    $why = $_SESSION['why'];
    $tech = $_SESSION['tec'];
    $man = $_SESSION['man'];
    $des = $_SESSION['des'];



    require_once('connection.php');
    // $sql="INSERT INTO users(name, email, mobile_number,password,repass) values ('$n', '$e','$nu','$pa','$repa')";
    $sql = "INSERT INTO registration (`name`,`number`,`email`,`regno`,`why`,`technical`,`design`,`management`)VALUES('$name','$number','$email','$regno','$why','$tech','$des','$man')";

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else { }
    if ($con->query($sql)) {
        // echo"<font color='green'>"."Your account has been created successfully!"."</font>";
        // echo "done";
    }
}


?>
<html>

<head>
    <title>STC Registration portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style type="text/css">
        body {
            background-color: #101C29;
            color: white;
        }

        #navBar {
            position: fixed;
            width: 100vw;
            height: 95px;
            background-color: #061F2F;
            transition: 0.2s;
            display: flex;
            padding: 0.5%;
            box-shadow: 50px;
        }

        .paragraph {
            padding: 5%;
            margin-left: 20%;
        }

        .vl {
            border-left: 2px solid white;
            height: 150px;
            position: absolute;
            left: 50%;
            margin-left: -30px;
        }

        .floatingNav {
            width: calc(100vh - 100px);
            border-radius: 2px;
            box-shadow: 0px 1px 10px #999;
        }

        .container {
            width: 100%;
            padding: 5%;
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style-type: none;
            float: left;
            width: 33.33%;
            position: relative;
            text-align: center;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            color: black;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 3px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }

        .progressbar li:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #ddd;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .progressbar li.active {
            color: green;
        }

        .progressbar li.active:before {
            border-color: green;
        }

        .progressbar li.active+li:after {
            background-color: green;
        }

        .form {
            margin-left: 30%;
            margin-right: 30%;
        }

        #clone {
            font-size: 25px;
            opacity: 0;
            font-family: sans-serif;
        }

        button {
            float: right;
        }

        footer {
            position: fixed;
            bottom: 0;
        }

        @media (max-height:800px) {
            footer {
                position: static;
            }

            header {
                padding-top: 40px;
            }
        }


        .footer-distributed {
            background-color: #4D9BF7;
            color: white;
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px sans-serif;
            padding: 50px 50px 60px 50px;
            margin-top: 80px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }

        .footer-distributed .footer-left {
            width: 30%;
        }

        .footer-distributed h3 {
            color: #ffffff;
            font: normal 36px 'Cookie', cursive;
            margin: 0;
        }

        .footer-distributed .footer-left img {
            width: 30%;
        }

        .footer-distributed h3 span {
            color: #e0ac1c;
        }

        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-company-name {
            color: white;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }

        /* Footer Center */

        .footer-distributed .footer-center {
            width: 35%;
        }


        .footer-distributed .footer-center i {
            background-color: #33383b;
            color: #ffffff;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: #ffffff;
            vertical-align: middle;
            margin: 0;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .footer-distributed .footer-center p a {
            color: #e0ac1c;
            text-decoration: none;
            ;
        }

        .footer-distributed .footer-right {
            width: 30%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: white;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 50%;

            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 35px;

            margin-right: 3px;
            margin-bottom: 5px;
        }

        @media (max-width: 880px) {

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i {
                margin-left: 0;
            }

            .vl {
                display: none;
            }

        }
    </style>
</head>

<body>
    <nav class="navbar navbar" style="background-color: #061F2F;">
        <a class="navbar-brand" href="#" style="margin-left: 40%;">
            <img src="stc.png" width="130" height="70" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <div class="verify">
        <img src="verify.png" alt="verified" style="margin-left: 37%; margin-top: 5%; width: 240px; height: 240px;">
    </div>
    <div class="paragraph">
        <h4>Thanks for registering with us</h4><br><br>
        <p>You will be intimated of the further details on the email address provided by you shortly.</p>
    </div>
    <footer class="footer-distributed">
        <div class="footer-left">
            <p class="footer-company-about">
                <span>Feel free to ask us anything.</span>
                Our social handles</p>
            <div class="footer-icons">
                <a href="https://www.facebook.com/mstcvit/?ref=br_rs"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/mstcvit/?hl=en"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/micvitvellore/about/"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="footer-center">
            <div class="vl"></div>
        </div>
        <div class="footer-right">

            <img src="stc.png">
            <p class="footer-company-name"><b>Student Technical Community</b></p>
        </div>
    </footer>

</body>

</html>
