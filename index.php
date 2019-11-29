<?php
session_start();
?>
<html>

<head>
    <title>STC Registration portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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

        p {
            margin-left: 25%;
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
            color: BLACK;
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

        input {
            font-size: 15px;
            padding: 1%;
            color: white;
            background-color: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid grey;
            width: 80%;
            min-width: 200px;
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
            margin-right: 10%;
        }

        .paragraph {
            margin-left: 30%;
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

        .footer {
            position: fixed;
            left: 0;
            width: 100%;
            background-color: #4D9BF7;
            color: white;
        }

        .paragraph {
            margin-left: 30%;
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

<body>
    <!-- Image and text -->
    <nav class="navbar navbar" style="background-color: #061F2F;">
        <a class="navbar-brand" href="#" style="margin-left: 40%;">
            <img src="stc.png" width="130" height="70" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <div class="container">
        <ul class="progressbar">
            <li class="active">General Information</li>
            <li>Q/A</li>
            <li>Interested Domain</li>
        </ul>
    </div><br><br><br>
    <div class="container-fluid">
        <p><b>Let's get started. So tell us who you are...</b></p>
        <form action="why.php" method="post">
            <div class="form">
                <label>1. Name:</label><br>
                <input type="text" name="name" required>
                <span id="clone"></span><br>
                <label>2. Mobile Number: (Without +91)</label><br>
                <input type="tel" name="phone" required patter="[0-9]{10}">
                <span id="clone"></span><br>
                <label>3. Email id:</label><br>
                <input type="email" name="email" required>
                <span id="clone"></span><br>
                <label>4. Registration No. </label><br>
                <input type="text" name="regno" required>
                <span id="clone"></span><br><br>
                <!-- <button class="btn btn-primary"  onclick="index3.html">Next</button> -->
                <input class="btn btn-primary" type="submit" name="Submit" value="Next">
            </div>
        </form>
    </div>
    <footer class="footer-distributed">
        <div class="footer-left">
            <p class="footer-company-about">
                <span>Feel free to ask us anything.</span>
                Our social handles</p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
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