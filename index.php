<?php
include_once "header.php";

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="img/home.jpg" alt="" style="width: 100%">
        </div>
    </div>

    <?php if (!isset($_SESSION['user_id'])) { ?>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-form">
                    <h4>
                        Login
                    </h4>

                    <form action="index.php" method="post">
                        <div>
                            <input type="text" placeholder="Email*" name="email" required>
                        </div>

                        <div>
                            <input type="password" placeholder="Password*" required name="password">
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            I accept terms & conditions
                        </div>
                        <div>
                            <br><br>
                            <p class="text-center">
                                <button class="btn" type="submit" name="login">Login</button>
                            </p>
                        </div>
                    </form>
                    <div>
                        Don't have an account <a href="register.php">Register here</a>
                    </div>
                    <br><br>

                    <?php
                    if (isset($_POST['login']) && strlen($err) > 0) {
                        print '<span style="color:red;">' . $err . '</span>';
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="background-color: white;margin-top: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/hand_home.jpg" alt="" style="width: 100%">
                </div>
                <div class="col-md-6">
                    <h2 style="margin-top: 20px;color: #d7d7d7">About EHDP System: </h2>
                    <p style="margin-top: 20px;color: #d7d7d7;line-height: 40px;">
                        The effective heart disease prediction system is a non-profit website designed to provide a
                        prediction for both doctors and patients to view the probability of developing heart disease.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>
