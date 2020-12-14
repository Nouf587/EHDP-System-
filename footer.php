<?php
?>

<style>
    .footer {
        margin-top: 20px;
        padding: 40px;
        background-color: black;
        border-top: 2px solid #7133d7;
    }

    .footer a {
        color: #d7d7d7;
        text-decoration: none;
    }
    .footer a:hover {
        color: #d7d7d7;
    }
    .footer {
        color: white;
    }
</style>

<div class="footer">
    <div class="row">
        <div class="col-md-4">
            <img src="img/phone.jpg" style="width:32px;height:40px;object-fit:fill" alt="">
            Call us today on 920064836
        </div>
        <div class="col-md-4">
            <img src="img/email.jpg" alt="">
            Email: EHDP@gmail.com
        </div>
        <div class="col-md-4">
            <img src="img/faq.jpg" alt="">
            <a href="faq.php">FAQ</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>


<script>
    $(document).ready(function () {
        const dropDownMenu = $('.drop-down-menu');
        dropDownMenu.mouseenter(function () {
            const menu_id = $(this).data('show-menu');
            $(menu_id).css('display', 'block');
        });

        $('.custom-header').mouseleave(function () {
            // const menu_id = $(this).data('show-menu');
            $("#sub-menu-more").css('display', 'none');
        });
    });
</script>
</body>
</html>

