<?php
session_start();
include 'app/appLogic.php';
include 'app/sliderOrSelect.php';

$form = new appLogic();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--slider https://woocommerce.com/flexslider/ -->
    <link rel="stylesheet" href="public/slider/flexslider.css"/>
    <script src="public/slider/jquery.flexslider.js"></script>

    <!--select  http://gregfranko.com/jquery.selectBoxIt.js/ -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="http://gregfranko.com/jquery.selectBoxIt.js/js/jquery.selectBoxIt.min.js"></script>
    <link rel="stylesheet" href="public/select/style.css"/>

    <link rel="stylesheet" href="public/css/style.css"/>
    <link
            href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap"
            rel="stylesheet"
    />

    <title>GAME OF THRONES</title>
</head>
<body>
<script src="public/js/function.js"></script>
<div class="page">
    <div class="flexslider">
        <ul class="slides">
            <?php getSlider(); ?>
        </ul>
    </div>
    <div class="page__form">
        <div class="page__heading">
            <h1>GAME OF THRONES</h1>
        </div>
        <?php $form->getForm(); ?>
    </div>
</div>
</body>
</html>