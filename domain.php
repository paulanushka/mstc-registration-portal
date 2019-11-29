<?php
session_start();

$_SESSION['why'] = filter_input(INPUT_POST, 'why');

if (
    !($_SESSION['why'])
) {
    header("Location: index.php");
}
?>
<html>

<head>
    <title>STC Registration portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        #search {
            width: 90%;
        }

        .searchicon {
            color: #5CB85C;
        }

        .items-collection {
            margin: 20px 0 0 0;
        }

        .items-collection label.btn-default.active {
            background-color: #007ba7;
            color: #FFF;
        }

        .items-collection label.btn-default {
            width: 90%;
            border: 1px solid #305891;
            margin: 5px;
            border-radius: 17px;
            color: #305891;
        }

        .items-collection label .itemcontent {
            width: 100%;
        }

        .items-collection .btn-group {
            width: 90%
        }

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

        .paragraph {
            margin-left: 30%;
        }

        label {
            display: block;
            border: solid 1px gray;
            line-height: 40px;
            height: 60px;
            width: 250px;
            border-radius: 40px;
            -webkit-font-smoothing: antialiased;
            margin-top: 10px;
            font-family: Arial, Helvetica, sans-serif;
            color: gray;
            text-align: center;
        }

        input[type=checkbox] {
            display: none;
        }

        input:checked+label {
            border: solid 3px#4D9BF7;
            color: white;
        }

        input:checked+label:before {
            content: "\2713 ";
        }

        .check {
            visibility: hidden;
        }

        input.checkbox:checked+label:before {
            content: "";
        }

        .demopadding {
            margin: 50px auto;
            width: 140px;
            text-align: center;
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
        .demopadding {
  margin:50px auto;
  width:140px;
  text-align:center;
}
.icon {
	position:relative;
	text-align:center;
	width:0px;
	height:0px;
	padding:20px;
	border-top-right-radius: 	20px;
	border-top-left-radius: 	20px;
	border-bottom-right-radius: 20px;
	border-bottom-left-radius: 	20px; 
	-moz-border-radius: 		20px 20px 20px 20px;
	-webkit-border-radius: 		20px 20px 20px 20px;
	-khtml-border-radius: 		20px 20px 20px 20px; 	
	color:#FFFFFF;
}
.icon i {
	font-size:20px;
	position:absolute;
	left:9px;
	top:10px;
}
.icon.social {
	float:left;
	margin:0 5px 0 0;
	cursor:pointer;
	background:#f2f2f2 ;
	color:#262626;
	transition: 0.5s;
	-moz-transition: 0.5s;
	-webkit-transition: 0.5s;
	-o-transition: 0.5s; 	
}
.icon.social:hover {
	background:#262626 ;
	color:#6d6e71;
	transition: 0.5s;
	-moz-transition: 0.5s;
	-webkit-transition: 0.5s;
	-o-transition: 0.5s;
	-webkit-filter:	drop-shadow(0 1px 10px rgba(0,0,0,.8));
	-moz-filter: 	drop-shadow(0 1px 10px rgba(0,0,0,.8));
	-ms-filter: 		drop-shadow(0 1px 10px rgba(0,0,0,.8));
	-o-filter: 		drop-shadow(0 1px 10px rgba(0,0,0,.8));
	filter: 			drop-shadow(0 1px 10px rgba(0,0,0,.8));	 	
}
.icon.social.fb i {
	left:13px;
	top:10px;
}
.icon.social.ig i {
	left:11px;
}
.icon.social.in i {
	left:11px;
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
    <div class="container">
        <ul class="progressbar">
            <li class="active">General Information</li>
            <li class="active">Q/A</li>
            <li>Interested Domain</li>
        </ul>
    </div><br><br><br>
    <form action="thanku.php" method="post">
        <div class="form">
            <i class="far fa-circle"></i> <b>Interested Domains</b>
            <br> <br>
            <p>(Please select below)</p>
            <input class="checkbox" id="lists[new]" type="checkbox" name="tec" value="Yes" />
            <label for="lists[new]"><span class="check">✓</span><img src="tech.png"
                    style="width: 40px; height: 40px;">Technical</label>
            <input class="checkbox" id="lists[new1]" type="checkbox" name="man" value="Yes" />
            <label for="lists[new1]"><span class="check">✓</span><img src="management.png"
                    style="width: 40px; height: 40px;">Management</label>
            <input class="checkbox" id="lists[new2]" type="checkbox" name="des" value="Yes" />
            <label for="lists[new2]"><span class="check">✓</span><img src="design.png"
                    style="width: 40px; height: 40px;">Design</label>
            <button class="btn btn-primary" style="margin-left: 200px; width: 100px; margin-left: 20%;">Submit</button>
    </form>

    <footer class="footer-distributed">
        <div class="footer-left">
            <p class="footer-company-about">
                <span>Feel free to ask us anything.</span>
                Our social handles :</p>
                <div class='demopadding'>
			                <div class='icon social fb'><a href="https://www.facebook.com/mstcvit/?ref=br_rs"><i class='fa fa-facebook'></i></a></div>
                                        <div class='icon social ig'><i class='fa fa-instagram'></i></div>
                                        <div class='icon social in'><a href="https://www.linkedin.com/company/micvitvellore/about/"><i class='fa fa-linkedin'></i></a></div>
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
