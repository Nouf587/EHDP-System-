<?php
include_once 'header.php';


if (isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
}
?>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="img/home.jpg" alt="" style="width: 100%;">
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-10">
            <h3 class="text-center">
                Registration Form
            </h3>
            <br><br>

            <form method="post" action="register.php">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Full Name" required name="full_name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" placeholder="Email" required name="email">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="password" name="password" required placeholder="Password* ">
                    </div>
                    <div class="col-md-6">
                        <p>What kind of user are you?</p>

                        <label for=""><input type="radio" name="user_type" value="1"> Doctor</label>
                        <label for=""><input type="radio" name="user_type" value="0" checked> Patient</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>Create your profile </h3>
                    </div>

                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="">
                    </div>

                    <div class="col-md-12">
                        <label for="">Bio</label>
                        <input type="text" name="bio" id="" style="width: 100%">
                    </div>

                    <div class="col-md-12">
                        <label for="">Clinic Information</label>
                        <input type="text" name="clinic_info" id="" style="width: 100%;">
                    </div>

                    <div class="col-md-12">
                        <label for="">Speciality & Experience</label>
                        <input type="text" name="experience" id="" style="width: 100%;">
                    </div>

                    <div class="text-center col-md-12">
                        <button class="btn" name="register" type="submit" style="width: 200px;padding: 20px;">
                            Save Profile
                        </button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
