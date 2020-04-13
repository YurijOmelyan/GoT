<?php

foreach ($listHouses as $key => $value): ?>
    <li>
        <img id='house<?= $key; ?>' src='<?= PATH_IMAGES . $value; ?>' class='<?= $key; ?>' alt='<?= $key; ?>'/>
    </li>
<? endforeach; ?>
<script src="../public/js/components/runSlider.js"></script>