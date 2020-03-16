<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--slider https://woocommerce.com/flexslider/ -->
    <link rel="stylesheet" href="Public/slider/flexslider.css"/>
    <script src="Public/slider/jquery.flexslider.js"></script>

    <!--select  http://gregfranko.com/jquery.selectBoxIt.js/ -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="http://gregfranko.com/jquery.selectBoxIt.js/js/jquery.selectBoxIt.min.js"></script>
    <link rel="stylesheet" href="Public/select/style.css"/>

    <link rel="stylesheet" href="Public/css/style.css"/>
    <link
            href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap"
            rel="stylesheet"
    />

    <title>GAME OF THRONES</title>
</head>
<body>
<div class="page">
    <div class="flexslider">
        <ul class="slides">
            <?php $dir = 'Public/images/house/';
            $file = 'imageList.json';
            $json = file_get_contents($dir . $file);
            $arr = json_decode($json, true);
            foreach ($arr as $key => $value): ?>
                <li>
                    <img id='house<?= $key; ?>' src='<?= $dir . $value; ?>' class='<?= $key; ?>' alt='<?= $key; ?>'/>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="page__form">
        <div class="page__heading">
            <h1>GAME OF THRONES</h1>
        </div>
        <?php include "App/getForm.php"; ?>
    </div>
</div>
</body>
</html>