<?php
include_once "header.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
} else {

}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="img/hand.jpg">
        </div>
    </div>
</div>

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
            Estimate your risk of developing heart disease by filling the form
        </h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <form action="prediction.php" method="post">
            <div class="col-md-12" style="padding: 10px;box-sizing: border-box;background-color: white">
                <h3>Add Data</h3>


                <?php if (isset($_POST['make_prediction']) && strlen($answer) > 0 && $answer == '+') { ?>
                    <br>

                    <div class="alert alert-danger text-center">
                        <h3>
                            Positive
                        </h3>
                    </div>

                <?php } ?>

                <?php if (isset($_POST['make_prediction']) && strlen($answer) > 0 && $answer == '-') { ?>
                    <br>

                    <div class="alert alert-danger text-center">
                        <h3>
                            Negative
                        </h3>
                    </div>

                <?php } ?>


                <div class="row">

                    <div class="col-md-4">
                        <label for="">Age</label>
                        <input type="number" min="20" max="90" name="age" required placeholder="Age must be 20-90">
                    </div>
                    <div class="col-md-4">
                        <p>Gender *</p>
                        <div>
                            <label for=""><input type="radio" name="sex" value="male" checked> Male</label>
                        </div>

                        <div>
                            <label for=""><input type="radio" name="sex" value="female"> Female</label>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="">Resting blood pressure (mm Hg)</label>
                        <input type="number" min="100" max="300" name="trestbps" placeholder="100 - 300">
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-4">
                        <p><label for="">chest pain (CP)</label></p>
                        <select name="cp" class="form-control">
                            <option value="asympt">asympt</option>
                            <option value="non_anginal">non_anginal</option>
                            <option value="typ_angina">typ_angina</option>
                            <option value="atyp_angina">atyp_angina</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p>Number of vessels</p>
                        <input type="number" min="0" max="3" required name="ca" placeholder="0-3">


                    </div>

                </div>


                <br>
                <div class="row">

                    <div class="col-md-4">
                        <p><label for="">Fasting blood sugar (mg/dL)</label></p>
                        <select name="fbs" class="form-control" id="">
                            <option value="t">T</option>
                            <option value="f">F</option>
                        </select>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <label for="">Total cholesterol (mg/dL)</label>
                        <input type="number" min="130" max="320" name="chol" placeholder="must be between  130-320">
                    </div>
                </div>

                <br>
                <div class="row">

                    <div class="col-md-4">
                        <label for="">chestResting electrographic result</label>
                        <select type="text" name="restecg" class="form-control">
                            <option value="normal">normal</option>
                            <option value="left_vent_hyper">left_vent_hyper</option>
                            <option value="st_t_wave_abnormality">st_t_wave_abnormality</option>
                        </select>
                    </div>
                    <div class="col-md-4">

                        <p>how often do you exercise?</p>
                        <div>
                            <label for=""><input type="radio" name="slope" checked value="up"> Up</label>
                        </div>

                        <div>
                            <label for=""><input type="radio" name="slope" value="flat"> Flat</label>
                        </div>

                        <div>
                            <label for=""><input type="radio" name="slope" value="down"> Down</label>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="">Total heart rate achieved</label>
                        <input type="number" min="60" max="130" name="thalach" required
                               placeholder="must be between  60-130">
                    </div>
                </div>


                <br>
                <div class="row">

                    <div class="col-md-4">
                        <label for="">do you have depression</label>
                        <input type="number" min="0.1" step="0.1" max="5" placeholder="ex. 1.3" required name="oldpeak">
                    </div>
                    <div class="col-md-4">
                        <p>Thal </p>
                        <select class="form-control" name="thal">
                            <option value="normal">normal</option>
                            <option value="reversable_defect">reversable_defect</option>
                            <option value="fixed_defect">fixed_defect</option>
                        </select>


                    </div>
                    <div class="col-md-4">
                        <label for="">do you suffer from obesity?</label>
                        <select name="exang" class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>


                <div class="text-center">
                    <br><br>
                    <Button class="btn" name="make_prediction" type="submit"
                            style="padding: 20px;border-radius: 180px;">
                        Predict
                    </Button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include_once "footer.php"
?>
