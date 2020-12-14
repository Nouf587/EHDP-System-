<?php
include_once "header.php";
?>

<style>
    .risk_div {
        padding: 20px;
        box-sizing: border-box;
        background-color: #87B1CB;
        color: white;
        text-align: center;

    }
</style>
<div class="risk_div">
    <div class="container">
        <h1 style="font-size: 50px !important;">
            Here is the nearest hospital based on your location
        </h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="padding: 10px;background-color: white;box-sizing: border-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14950959.936356548!2d36.04154841571084!3d23.81373745186018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1583764512535!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>

<?php
include_once "footer.php";
?>
