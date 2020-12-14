<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db');
if (!$conn) die();

if (isset($_POST['register'])) {
    global $conn;
    $pass = md5($_POST['password']);
    $sql = "insert into users values (null, '{$_POST['full_name']}', '{$_POST['email']}', '$pass', {$_POST['user_type']}, '{$_POST['phone']}', '{$_POST['bio']}', '{$_POST['clinic_info']}', '{$_POST['experience']}')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        header('Location: ./index.php');
    } else {
        print mysqli_error($conn);
    }
}

$err = '';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    global $conn;
    $sql = "select * from users where email = '$email' and password = '$pass' limit 1";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['user_id'] = mysqli_fetch_assoc($res)['id'];
        header('Location: ./index.php');
    } else {
        $err = 'Email or/and password is wrong, try again.';
    }
}


$answer = '';

if (isset($_POST['make_prediction'])) {

    $par1 = $_POST['age'];
    $par2 = $_POST['sex'];
    $par3 = $_POST['cp'];
    $par4 = $_POST['trestbps'];
    $par5 = $_POST['chol'];
    $par6 = $_POST['fbs'];
    $par7 = $_POST['restecg'];
    $par8 = $_POST['thalach'];
    $par9 = $_POST['exang'];
    $par10 = $_POST['oldpeak'];
    $par11 = $_POST['slope'];
    $par12 = $_POST['ca'];
    $par13 = $_POST['thal'];

    $request_url = "http://localhost:5000/predict?par1=$par1&par2=$par2&par3=$par3&par4=$par4&par5=$par5&par6=$par6&par7=$par7&par8=$par8&par9=$par9&par10=$par10&par11=$par11&par12=$par12&par13=$par13";
    //print $request_url;
    $response = json_decode(file_get_contents($request_url));
    $answer = $response->answer;

    if ($answer == '>50_1') {
        $answer = '+';
    } else {
        $answer = '-';
    }

    $sql = "insert into prediction values(null, '{$_SESSION['user_id']}', '$par1', '$par2', '$par3', '$par4', '$par5', '$par6', '$par7', '$par8', '$par9', '$par10', '$par11', '$par12', '$par13', '$answer')";
    mysqli_query($conn, $sql);

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <style>
        .custom-header {
            padding: 50px;
            background-color: white;
        }

        .menu a {
            text-decoration: none;
            color: #87B1CB;
            transition: color 0.4s ease 0s;
            margin-right: 15px;
        }

        .sub-menu-more {

            width: 200px;
            padding: 10px;
            background-color: white;
            position: absolute;
            border: 1px solid #87B1CB;
            top: 25px;
            left: 230px;
            display: none;
            z-index: 10000;
        }

        .sub-menu-more .menu-item {
            margin: 3px;
            transition: linear .5s;
            padding: 5px;
        }

        .sub-menu-more .menu-item a {
            display: block;
        }

        .login-form {
            padding: 20px;
            background-color: white;
        }

        input[type='text'], input[type='number'], input[type='password'], input[type='email'] {
            border-radius: 0;
            font: italic normal normal 14px/1.4em georgia, palatino, 'book antiqua', 'palatino linotype', serif;
            -webkit-appearance: none;
            -moz-appearance: none;
            border-width: 2px;
            background-color: rgba(255, 255, 255, 1);
            box-sizing: border-box !important;
            color: #000000;
            border-style: solid;
            border-color: rgba(0, 0, 0, 1);
            padding: 10px;
            padding-left: 3px;
            margin: 0;
            max-width: 100%;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            text-overflow: ellipsis;
            width: 100%;
            margin-bottom: 10px;
        }

        button.btn {
            background-color: #333;
            color: #fff;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            width: 100px;
            border: 0;
            outline: 0;
            cursor: pointer;
        }

    </style>

</head>
<body>

<div class="custom-header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="img/logo.jpg" alt="" style="width: 100%;vertical-align: center">
            </div>
            <div class="col-md-9">
                <div class="menu" style="border: 0px solid #333;margin-top: 45px;position:relative;">
                    <span><a href="index.php">Home</a></span>

                    <span style="margin-right: 15px;"> | </span>

                    <span><a href="prediction.php">Make Prediction</a></span>

                    <span style="margin-right: 15px;"> | </span>

                    <span><a class="drop-down-menu" href="#" data-show-menu="#sub-menu-more">More



                        </a></span>

                    <div class="sub-menu-more" id="sub-menu-more">
                        <div class="menu-item">
                            <a href="faq.php">FAQ</a>
                        </div>
                        <div class="menu-item">
                            <a href="register.php">Register</a>
                        </div>

                        <div class="menu-item">
                            <a href="hospitals.php">View nearest hospitals</a>
                        </div>

                        <div class="menu-item">
                            <a href="facts.php">Facts</a>
                        </div>

                        <div class="menu-item">
                            <a href="tips.php">Tips</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

